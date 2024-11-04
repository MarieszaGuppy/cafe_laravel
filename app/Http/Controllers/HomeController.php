<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Menu;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use App\Models\Gallery;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        return view('user.home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        $totalOrders = Order::count();
        $totalUsers = User::where('type', 'user')->count(); // Asumsi 'type' untuk membedakan tipe user
        $totalMenus = Menu::count();
        $totalArticles = Article::count();
        $totalGalleries = Gallery::count();
        $totalCategories = Category::count();

        // Kirim data ke view
        return view('admin.adminHome', compact('totalOrders', 'totalUsers', 'totalMenus', 'totalCategories', 'totalArticles', 'totalGalleries'));
    }
}
