<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $articles = Article::query();

        // Filter berdasarkan kategori
        if (request('category_id') !== null) { // Periksa apakah ada parameter type
            $articles->where('category_id', request('category_id'));
        }

        // Filter berdasarkan pencarian judul
        if (request('search')) {
            $articles->where('title', 'like', '%' . request('search') . '%');
        }

        $articleCount = Article::count();
        return view('admin.articles.article', compact('articleCount'), ['articles' => $articles->latest()->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'title' => ['required', 'min:5'],
            'image' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:2048'],
            'slug' => ['required', 'min:5'],
            'category_id' => ['required'],
            'body' => ['required', 'min:10'],
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/articles', $image->hashName());

        //create user
        Article::create([
            'title' => $request->title,
            'image' => $image->hashName(),
            'author_id' => Auth::id(),
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'body' => $request->body
        ]);

        return redirect()->route('articles.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $article = Article::findOrFail($id);

        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'title' => ['required', 'min:5'],
            'image' => ['image', 'mimes:jpeg,jpg,png', 'max:2048'],
            'slug' => ['required', 'min:5'],
            'category_id' => ['required'],
            'body' => ['required', 'min:10'],
        ]);

        $article = Article::findOrFail($id);


        if ($request->hasFile('image')) {

            //upload image baru
            $image = $request->file('image');
            $image->storeAs('public/articles', $image->hashName());

            //hapus image lama
            Storage::delete('public/articles/' . $article->image);

            //update menu dengan image baru
            $article->update([
                'title' => $request->title,
                'image' => $image->hashName(),
                'slug' => $request->slug,
                'category_id' => $request->category_id,
                'body' => $request->body
            ]);
        } else {
            //update menu tanpa image
            $article->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'category_id' => $request->category_id,
                'body' => $request->body
            ]);
        }

        return redirect()->route('articles.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('articles.index')->with(['success' => 'Artikel Berhasil Dihapus']);
    }

    public function trash(): View
    {
        // Mengambil hanya data pengguna yang di-*soft delete*
        $trashedArticles = Article::onlyTrashed()->get();
        $trashedArticleCount = Article::onlyTrashed()->count();

        // Mengirim data ke view
        return view('admin.articles.trash', compact('trashedArticles', 'trashedArticleCount'));
    }

    public function restore($id): RedirectResponse
    {
        // Mencari pengguna yang di-soft delete berdasarkan ID dan mengembalikannya
        $trashedArticles = Article::onlyTrashed()->findOrFail($id);
        $trashedArticles->restore();

        return redirect()->route('admin.articles.trash')->with('success', 'Artikel berhasil dipulihkan.');
    }
}
