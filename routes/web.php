<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'login_submit']);
    Route::get('/forgot-password', [LoginController::class, 'forgot_password'])->name('forgot_password');
    Route::post('/forgot-password', [LoginController::class, 'forgot_password_submit'])->name('forgot_password_submit');
    Route::get('/reset-password/{token}/{email}', [LoginController::class, 'reset_password'])->name('reset_password');
    Route::post('/reset-password/{token}/{email}', [LoginController::class, 'reset_password_submit'])->name('reset_password_submit');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


/*---------------------------------
Semua list route untuk pelanggan
----------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/article', [HomepageController::class, 'article'])->name('article');
    Route::get('/article/{article:slug}', [HomepageController::class, 'showarticle'])->name('user.article.show');
    Route::get('/gallery', [HomepageController::class, 'gallery'])->name('gallery');
    Route::get('/menu', [OrderController::class, 'order'])->name('menu');
    Route::post('/menu', [OrderController::class, 'add'])->name('order.add');
    Route::get('/menu/{menu:slug}', [MenuController::class, 'detail'])->name('user.menu.show');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::delete('/orders/{order}/items/{item}', [OrderController::class, 'destroy'])->name('order.items.destroy');
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
    Route::post('/checkout', [OrderController::class, 'processCheckout'])->name('checkout.process');
    Route::get('/history', [OrderController::class, 'history'])->name('history');
    Route::get('/about', [HomepageController::class, 'about'])->name('about');
    Route::get('/contact', [HomepageController::class, 'contact'])->name('contact');
});

/*---------------------------------
Semua list route untuk admin
----------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::resource('/admin/users', UserController::class);
    Route::get('/users/trash', [UserController::class, 'trash'])->name('admin.users.trash');
    Route::post('/users/{id}/restore', [UserController::class, 'restore'])->name('admin.users.restore');
    Route::resource('/admin/articles', ArticleController::class);
    Route::get('/articles/trash', [ArticleController::class, 'trash'])->name('admin.articles.trash');
    Route::post('/articles/{id}/restore', [ArticleController::class, 'restore'])->name('admin.articles.restore');
    Route::resource('/admin/galleries', GalleryController::class);
    Route::get('/galleries/trash', [GalleryController::class, 'trash'])->name('admin.galleries.trash');
    Route::post('/galleries/{id}/restore', [GalleryController::class, 'restore'])->name('admin.galleries.restore');
    Route::resource('/admin/menus', MenuController::class);
    Route::get('/admin/menus/{menu:slug}', [MenuController::class, 'show'])->name('menus.show');
    Route::get('/menus/trash', [MenuController::class, 'trash'])->name('admin.menus.trash');
    Route::post('/menus/{id}/restore', [MenuController::class, 'restore'])->name('admin.menus.restore');
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders.order');
    Route::get('/admin/orders/{id}', [OrderController::class, 'detail'])->name('orders.show');
    Route::get('/transactions/{order}', [TransactionController::class, 'buy'])->name('order.transaction');
    Route::get('/admin/transactions', [TransactionController::class, 'transactions'])->name('admin.transactions');
    Route::get('/admin/transactions/{id}/struk', [TransactionController::class, 'struk'])->name('transactions.struk');
    Route::post('/transactions/{order}', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/admin/salesreports', [AdminController::class, 'salesreports'])->name('admin.salesreports');
});
