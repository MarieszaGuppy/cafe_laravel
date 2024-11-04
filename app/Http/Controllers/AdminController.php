<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function usersList(): View
    {
        return view('admin.users.user');
    }

    public function articles(): View
    {
        return view('admin.articles.article');
    }

    public function galleries(): View
    {
        return view('admin.galleries.gallery');
    }

    public function menus(): View
    {
        return view('admin.menus.menu');
    }

    public function orders(): View
    {
        return view('admin.orders.order');
    }

    public function salesreports(): View
    {
        // Menghitung total dari order yang statusnya 'completed'
        $totalRevenue = Order::where('status', 'completed')->sum('total_price');

        // Mengirimkan total revenue ke view
        return view('admin.salesreports.salesreport', compact('totalRevenue'));
    }
}
