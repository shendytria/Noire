<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Public Routes (Guest)
|--------------------------------------------------------------------------
| Halaman yang bisa dilihat semua orang (termasuk belum login)
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', fn() => view('pages.services'))->name('services');
Route::get('/blog', fn() => view('pages.blog'))->name('blog');
Route::get('/contact', fn() => view('pages.contact'))->name('contact');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
| Halaman login dan register
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.post');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.post');
Route::post('/register', [AuthController::class, 'register'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Customer Routes (setelah login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'isCustomer'])->group(function () {
    Route::get('/cart', fn() => view('pages.cart'))->name('cart');
    Route::get('/checkout', fn() => view('pages.checkout'))->name('checkout');
    Route::get('/thankyou', fn() => view('pages.thankyou'))->name('thankyou');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','isAdmin'])->prefix('admin')->as('admin.')->group(function(){
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);
});

