<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::take(3)->get();
        $testimonials = Testimonial::all();
        $blogs = Blog::latest()->take(3)->get(); 

        return view('pages.index', compact('products','testimonials','blogs'));
    }
}
