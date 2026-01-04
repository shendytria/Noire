<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Coupon;
use App\Models\Blog;
use App\Models\Testimonial;

class AdminController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();
        $usersCount = User::count();
        $couponsCount = Coupon::count();
        $blogsCount = Blog::count();
        $testimonialsCount = Testimonial::count();

        return view('admin.dashboard', compact(
            'productsCount',
            'usersCount',
            'couponsCount',
            'blogsCount',
            'testimonialsCount'
        ));
    }

    public function products()
    {
        return view('admin.products');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
}
