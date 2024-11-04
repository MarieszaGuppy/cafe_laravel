<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::where('status', 'processed')->with('items')->latest()->paginate(5);
        $orderCount = Order::where('status', 'processed')->count();
        return view('admin.orders.order', compact('orders', 'orderCount'));;
    }

    public function order(): View
    {
        $menus = Menu::latest()->get();
        return view('user.menu', compact('menus'));
    }

    public function add(Request $request): RedirectResponse
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Cari pesanan dengan status 'pending' untuk pelanggan yang sedang login
        $order = Order::where('user_id', Auth::id())->where('status', 'pending')->first();

        if (!$order) {
            // Jika tidak ada pesanan 'pending', hitung nilai user_order_id yang baru
            $latestUserOrderId = Order::where('user_id', Auth::id())->max('user_order_id') ?? 0;

            // Buat pesanan baru
            $order = Order::create([
                'user_id' => Auth::id(),
                'user_order_id' => $latestUserOrderId + 1,
                'status' => 'pending',
                'total_price' => 0,
            ]);
        }

        // Menambahkan item menu ke pesanan
        $menu = Menu::findOrFail($request->menu_id);
        $orderItem = new OrderItem([
            'menu_id' => $menu->id,
            'quantity' => $request->quantity,
            'price' => $menu->price * $request->quantity,
        ]);
        $order->items()->save($orderItem);

        // Update total price order
        $order->total_price += $orderItem->price;
        $order->save();

        return redirect()->route('order.show', $order->id)->with('success', 'Item berhasil ditambahkan ke order.');
    }

    public function show($id)
    {
        $menus = Menu::latest()->get();
        // Ambil order berdasarkan ID pelanggan yang sedang login
        $order = Order::where('id', $id)->where('user_id', Auth::id())->with('items')->firstOrFail();

        return view('user.orders.show', compact('order', 'menus'));
    }

    public function detail($id)
    {
        $order = Order::where('id', $id)->with('items')->firstOrFail();

        return view('admin.orders.show', compact('order'));
    }

    public function checkout()
    {
        // Ambil pesanan "pending" untuk pelanggan yang sedang login
        $order = Order::where('user_id', Auth::id())->where('status', 'pending')->with('items')->firstOrFail();

        return view('orders.checkout', compact('order'));
    }

    public function processCheckout(Request $request): RedirectResponse
    {

        $order = Order::where('user_id', Auth::id())->where('status', 'pending')->with('items')->firstOrFail();

        // Check apakah order ada item menu
        if ($order->items->isEmpty()) {
            return redirect()->back()->withErrors('Order tidak dapat diproses karena tidak ada item dalam pesanan.');
        }

        // Update status order menjadi processed dan update tanggal order
        $order->update([
            'status' => 'processed',
            'order_date' => now(),
        ]);

        // Loop melalui setiap item dalam order
        foreach ($order->items as $item) {
            // Kurangi stok menu sesuai dengan kuantitas yang dipesan
            $menu = Menu::findOrFail($item->menu_id);
            $menu->stock -= $item->quantity;
            $menu->save();
        }

        return redirect()->route('history')->with('success', 'Pesanan berhasil diproses.');
    }

    public function history(): View
    {
        $orders = Order::where('user_id', Auth::id())->where('status', 'processed')->with('items')->get();

        return view('user.orders.history', compact('orders'));
    }

    public function destroy($orderId, $itemId)
    {
        $orderItem = OrderItem::where('order_id', $orderId)->where('id', $itemId)->first();

        if ($orderItem) {
            $orderItem->delete();

            $order = Order::find($orderId);
            $order->total_price = $order->items->sum(function ($item) {
                return $item->price * $item->quantity;
            });
            $order->save();
        }

        return redirect()->back()->with('success', 'Item berhasil dibatalkan.');
    }
}
