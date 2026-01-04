@extends('layouts.app')

@section('title', 'Blog | Noiré')

@section('content')
<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Blog</h1>
                    <p class="mb-4">Noiré is crafted for those who value elegance in every detail.
                        Each scent is designed to express personality, confidence, and timeless charm.
                        Discover a fragrance that feels uniquely yours.</p>
                    <p>
                        @auth
                        <a href="{{ route('shop') }}" class="btn btn-secondary me-2">Shop Now</a>
                        <a href="{{ route('home') }}" class="btn btn-white-outline">Explore</a>
                        @endauth

                        @guest
                        <a href="{{ url('/register') }}" class="btn btn-secondary me-2">Register Now</a>
                        <a href="{{ url('/login') }}" class="btn btn-white-outline">Login</a>
                        @endguest
                    </p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="{{ asset('assets/images/parfum-hero.png') }}" class="img-fluid" alt="Parfum Hero" style="margin-left: 120px;">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->



<!-- Start Blog Section -->
<div class="blog-section">
    <div class="container">

        <div class="row">

            @foreach($blogs as $blog)
                <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">

                    <div class="post-entry">

                        <a href="{{ url('blog/' . $blog->slug) }}" class="post-thumbnail">
                            <img src="{{ asset('storage/' . $blog->image) }}"
                                 alt="{{ $blog->title }}" 
                                 class="img-fluid"
                                 style="width: 100%; height: 250px; object-fit: cover;">
                        </a>

                        <div class="post-content-entry">

                            <h3>
                                <a href="{{ url('blog/' . $blog->slug) }}">{{ $blog->title }}</a>
                            </h3>

                            <div class="meta">
                                <span>by <a href="#">{{ $blog->author }}</a></span>
                                <span>on <a href="#">{{ $blog->created_at->format('M d, Y') }}</a></span>
                            </div>

                        </div>

                    </div>

                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- End Blog Section -->

<!-- Start Testimonial Section -->
<div class="testimonial-section">
    <div class="container">

        <div class="row">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="section-title">Testimonials</h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-12">

                <div class="testimonial-slider-wrap text-center">

                    <div id="testimonial-nav">
                        <span class="prev" data-controls="prev">
                            <span class="fa fa-chevron-left"></span>
                        </span>

                        <span class="next" data-controls="next">
                            <span class="fa fa-chevron-right"></span>
                        </span>
                    </div>

                    <div class="testimonial-slider">

                        @foreach($testimonials as $testimonial)
                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;{{ $testimonial->content }}&rdquo;</p>
                                            </blockquote>

                                            <div class="author-info">

                                                <div class="author-pic">
                                                    <img src="{{ asset('storage/' . $testimonial->photo) }}"
                                                         class="img-fluid"
                                                         alt="{{ $testimonial->name }}"
                                                         style="width: 90px; height: 90px; object-fit: cover; border-radius: 50%;">
                                                </div>

                                                <h3 class="font-weight-bold">{{ $testimonial->name }}</h3>
                                                <span class="position d-block mb-3">
                                                    {{ $testimonial->position ?? '' }}
                                                </span>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
<!-- End Testimonial Section -->

@endsection
