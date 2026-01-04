<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Testimonial;

class ServicesController extends Controller
{
    public function index()
    {
        $products = Product::take(3)->get();
        $testimonials = Testimonial::all();

        return view('pages.services', compact('products','testimonials'));
    }
}
