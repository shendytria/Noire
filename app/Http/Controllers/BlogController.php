<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        $blogs = Blog::latest()->take(3)->get(); 

        return view('pages.blog', compact('testimonials', 'blogs'));
    }
}
