<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'photo' => 'nullable|image',
        ]);

        $path = $request->file('photo') ? $request->file('photo')->store('testimonials','public') : null;

        Testimonial::create([
            'name' => $request->name,
            'position' => $request->position,
            'content' => $request->content,
            'photo' => $path,
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'photo' => 'nullable|image',
        ]);

        if($request->hasFile('photo')){
            $path = $request->file('photo')->store('testimonials','public');
            $testimonial->photo = $path;
        }

        $testimonial->update([
            'name' => $request->name,
            'position' => $request->position,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully');
    }
}
