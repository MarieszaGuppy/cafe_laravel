<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::query();

        // Filter berdasarkan kategori
        if (request('category_id') !== null) { // Periksa apakah ada parameter kategori
            $galleries->where('category_id', request('category_id'));
        }

        // Filter berdasarkan pencarian deskripsi
        if (request('search')) {
            $galleries->where('description', 'like', '%' . request('search') . '%');
        }

        $galleryCount = Gallery::count();
        return view('admin.galleries.gallery', compact('galleryCount'), ['galleries' => $galleries->latest()->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.galleries.create');
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
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'category_id' => 'required',
            'description' => 'required|min:10',
            'slug' => 'required|min:5'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/galleries', $image->hashName());

        //create gallery
        Gallery::create([
            'image'         => $image->hashName(),
            'author_id' => Auth::id(),
            'category_id' => $request->category_id,
            'description' => $request->description,
            'slug' => $request->slug
        ]);

        return redirect()->route('galleries.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return view('admin.galleries.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $gallery = Gallery::findOrFail($id);

        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required',
            'description' => 'required|min:10',
            'slug' => 'required|min:5'
        ]);

        $gallery = Gallery::findOrFail($id);


        if ($request->hasFile('image')) {

            //upload image baru
            $image = $request->file('image');
            $image->storeAs('public/galleries', $image->hashName());

            //hapus image lama
            Storage::delete('public/galleries/' . $gallery->image);

            //update menu dengan image baru
            $gallery->update([
                'image'         => $image->hashName(),
                'category_id' => $request->category_id,
                'description' => $request->description,
                'slug' => $request->slug
            ]);
        } else {
            //update menu tanpa image
            $gallery->update([
                'category_id' => $request->category_id,
                'description' => $request->description,
                'slug' => $request->slug
            ]);
        }

        return redirect()->route('galleries.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();
        return redirect()->route('galleries.index')->with(['success' => 'Galeri Berhasil Dihapus']);
    }

    public function trash(): View
    {
        // Mengambil hanya data pengguna yang di-*soft delete*
        $trashedGalleries = Gallery::onlyTrashed()->get();
        $trashedGalleryCount = Gallery::onlyTrashed()->count();

        // Mengirim data ke view
        return view('admin.galleries.trash', compact('trashedGalleries', 'trashedGalleryCount'));
    }

    public function restore($id): RedirectResponse
    {
        // Mencari pengguna yang di-soft delete berdasarkan ID dan mengembalikannya
        $trashedGalleries = Gallery::onlyTrashed()->findOrFail($id);
        $trashedGalleries->restore();

        return redirect()->route('admin.galleries.trash')->with('success', 'Gambar berhasil dipulihkan.');
    }
}
