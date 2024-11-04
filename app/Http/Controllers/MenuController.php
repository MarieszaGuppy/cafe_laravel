<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index(): View
    {
        $menus = Menu::query();

        // Filter berdasarkan kategori
        if (request('category_id') !== null) { // Periksa apakah ada parameter type
            $menus->where('category_id', request('category_id'));
        }

        // Filter berdasarkan pencarian judul
        if (request('search')) {
            $menus->where('title', 'like', '%' . request('search') . '%');
        }

        $menuCount = Menu::count();
        return view('admin.menus.menu', compact('menuCount'), ['menus' => $menus->latest()->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.menus.create');
    }

    /**
     * store
     * 
     * @param mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|min:5',
            'category_id' => 'required',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'slug' => 'required|min:5'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/menus', $image->hashName());

        //create menu
        Menu::create([
            'image' => $image->hashName(),
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'slug' => $request->slug,
        ]);

        return redirect()->route('menus.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return view('admin.menus.show', compact('menu'));
    }

    public function detail(Menu $menu)
    {
        return view('user.detailmenu', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $menu = Menu::findOrFail($id);

        return view('admin.menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|min:5',
            'category_id' => 'required',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'slug' => 'required|min:5'
        ]);

        $menu = Menu::findOrFail($id);

        if ($request->hasFile('image')) {

            //upload image baru
            $image = $request->file('image');
            $image->storeAs('public/menus', $image->hashName());

            //hapus image lama
            Storage::delete('public/menus/' . $menu->image);

            //update menu dengan image baru
            $menu->update([
                'image' => $image->hashName(),
                'name' => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'slug' => $request->slug,
            ]);
        } else {
            //update menu tanpa image
            $menu->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'slug' => $request->slug,
            ]);
        }
        return redirect()->route('menus.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('menus.index')->with(['success' => 'Menu Berhasil Dihapus']);
    }

    public function trash(): View
    {
        // Mengambil hanya data pengguna yang di-*soft delete*
        $trashedMenus = Menu::onlyTrashed()->get();
        $trashedMenuCount = Menu::onlyTrashed()->count();

        // Mengirim data ke view
        return view('admin.menus.trash', compact('trashedMenus', 'trashedMenuCount'));
    }

    public function restore($id): RedirectResponse
    {
        // Mencari pengguna yang di-soft delete berdasarkan ID dan mengembalikannya
        $trashedMenus = Menu::onlyTrashed()->findOrFail($id);
        $trashedMenus->restore();

        return redirect()->route('menus.index')->with('success', 'Menu berhasil dipulihkan.');
    }
}
