<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MidtransCallbackController;

/*
|--------------------------------------------------------------------------
| Public Routes (Guest)
|--------------------------------------------------------------------------
| Halaman yang bisa dilihat semua orang (termasuk belum login)
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/blog', [BlogController::class, 'index'])->name('blogs');
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
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/coupon', [CheckoutController::class, 'applyCoupon'])->name('checkout.coupon.apply');
    Route::delete('/cart/coupon', [CheckoutController::class, 'removeCoupon'])->name('checkout.coupon.remove');
    Route::patch('/cart/{id}/increase', [CartController::class, 'increase'])->name('cart.increase');
    Route::patch('/cart/{id}/decrease', [CartController::class, 'decrease'])->name('cart.decrease');
    Route::delete('/cart/item/{id}', [CartController::class, 'remove'])->name('cart.remove');

    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

    Route::get('/thankyou', fn() => view('pages.thankyou'))->name('thankyou');
});

/*
|--------------------------------------------------------------------------
| Midtrans Callback (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::post('/midtrans/callback', [MidtransCallbackController::class, 'handle'])->name('midtrans.callback');

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
    Route::resource('coupons', \App\Http\Controllers\Admin\CouponController::class);
});

