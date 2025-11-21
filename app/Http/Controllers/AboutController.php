<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;

class AboutController extends Controller
{
    public function index()
    {
        // Ambil semua testimonial (atau bisa kamu batasi)
        $testimonials = Testimonial::latest()->get();

        return view('pages.about', compact('testimonials'));
    }
}
