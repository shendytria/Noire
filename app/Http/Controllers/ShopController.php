<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all(); // ambil semua produk
        return view('pages.shop', compact('products'));
    }
}
