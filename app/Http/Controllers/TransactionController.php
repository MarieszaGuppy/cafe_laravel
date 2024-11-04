<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\View\View;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function transactions(): View
    {
        $transactions = Transaction::latest()->paginate(5);
        $orderCount = Order::where('status', 'completed')->count();
        return view('admin.transactions.transaction', compact('transactions', 'orderCount'));
    }

    public function buy(string $id): View
    {
        $order = Order::findOrFail($id);

        return view('admin.orders.transaction', compact('order'));
    }

    public function struk(string $id): View
    {
        $transaction = Transaction::findOrFail($id);

        return view('admin.transactions.struk', compact('transaction'));
    }

    public function store(Request $request, Order $order)
    {
        $request->validate([
            'amount_paid' => 'required|numeric|min:0',
        ]);

        // Hitung kembalian
        $change = $request->amount_paid - $order->total_price;

        // Buat transaksi baru
        Transaction::create([
            'order_id' => $order->id,
            'amount_paid' => $request->amount_paid,
            'change' => $change,
        ]);

        // Ubah status order menjadi completed
        $order->update(['status' => 'completed']);

        return redirect()->route('orders.order', $order)->with('success', 'Transaksi berhasil dilakukan.');
    }
}
