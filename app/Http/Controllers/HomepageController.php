<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gallery;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function article(): View
    {
        $articles = Article::latest()->get();
        return view('user.article', compact('articles'));
    }

    public function showarticle(Article $article)
    {
        return view('user.showarticle', compact('article'));
    }

    public function gallery(): View
    {
        $galleries = Gallery::latest()->get();
        return view('user.gallery', compact('galleries'));
    }

    public function about(): View
    {
        return view('user.about');
    }

    public function contact(): View
    {
        return view('user.contact');
    }
}
