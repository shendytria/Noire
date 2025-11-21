@extends('layouts.app')

@section('title', 'Home | Noiré')

@section('content')

<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">

            <div class="col-lg-5">
                <div class="intro-excerpt">

                    @if(Auth::check())
                        <h1 class="mb-4">Hi, {{ Auth::user()->name }} 👋</h1>
                        <p class="mb-5">Great to see you back at Noiré. Discover the latest fragrances that match your unique scent profile!</p>

                        <p>
                            <a href="{{ url('shop') }}" class="btn btn-secondary me-2">Shop Now</a>
                            <a href="{{ url('') }}" class="btn btn-white-outline">Explore</a>
                        </p>

                    @else
                        <h1 class="mb-4">Welcome to Noiré</h1>
                        <p class="mb-5">Join now and discover premium perfumes for every special moment.</p>

                        <a href="{{ url('/register') }}" class="btn btn-secondary me-2">Register Now</a>
                        <a href="{{ url('/login') }}" class="btn btn-white-outline">Login</a>
                    @endif

                </div>
            </div>

            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="{{ asset('assets/images/parfum-hero.png') }}" class="img-fluid" alt="Parfum Hero">
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- Start Product Section -->
<div class="product-section">
    <div class="container">
        <div class="row">

            <!-- Left Column -->
            <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                <h2 class="mb-4 section-title">Crafted with excellent material.</h2>
                <p class="mb-4">Discover premium, high-quality perfumes with elegant and long-lasting scents.</p>
                <p><a href="{{ route('shop') }}" class="btn">Explore</a></p>
            </div>

            <!-- Product Items -->
            @foreach ($products as $product)
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="{{ route('shop', $product->slug) }}">

                        <img src="{{ asset('storage/' . $product->image) }}"
                             class="img-fluid product-thumbnail" alt="{{ $product->name }}">

                        <h3 class="product-title">{{ $product->name }}</h3>

                        <strong class="product-price">
                            Rp{{ number_format($product->price, 0, ',', '.') }}
                        </strong>

                        <span class="icon-cross">
                            <img src="{{ asset('assets/images/cross.svg') }}" class="img-fluid">
                        </span>

                    </a>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- End Product Section -->

<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
    <div class="container">
        <div class="row justify-content-between">

            <div class="col-lg-6">
                <h2 class="section-title">Why Choose Us</h2>
                <p>We offer premium, high-quality perfumes with unique scents for every moment and personality.</p>

                <div class="row my-5">

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="{{ asset('assets/images/truck.svg') }}" class="img-fluid">
                            </div>
                            <h3>Free Worldwide Shipping</h3>
                            <p>We ship your fragrance worldwide at no extra cost.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="{{ asset('assets/images/bag.svg') }}" class="img-fluid">
                            </div>
                            <h3>Easy to Find Your Scent</h3>
                            <p>Find your favorite aroma easily from our curated collection.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="{{ asset('assets/images/support.svg') }}" class="img-fluid">
                            </div>
                            <h3>24/7 Customer Support</h3>
                            <p>Our team is ready to assist you anytime.</p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="{{ asset('assets/images/return.svg') }}" class="img-fluid">
                            </div>
                            <h3>Easy Returns & Exchanges</h3>
                            <p>Enjoy a hassle-free return and exchange process.</p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-5">
                <div class="img-wrap">
                    <img src="{{ asset('assets/images/why-choose-us-img.jpg') }}" class="img-fluid">
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Why Choose Us Section -->

<!-- Start We Help Section -->
<div class="we-help-section">
    <div class="container">
        <div class="row justify-content-between">

            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="imgs-grid">

                    <div class="grid grid-1">
                        <img src="{{ asset('assets/images/img-grid-1.jpg') }}" class="img-fluid">
                    </div>

                    <div class="grid grid-2">
                        <img src="{{ asset('assets/images/img-grid-2.jpg') }}" class="img-fluid">
                    </div>

                    <div class="grid grid-3">
                        <img src="{{ asset('assets/images/img-grid-3.jpg') }}" class="img-fluid">
                    </div>

                </div>
            </div>

            <div class="col-lg-5 ps-lg-5">
                <h2 class="section-title mb-4">We Help You Choose Your Perfect Scent</h2>
                <p>We help you find the perfume that best suits your style and special moments.</p>

                <ul class="list-unstyled custom-list my-4">
                    <li>Premium fragrances made from the finest ingredients</li>
                    <li>Long-lasting scents throughout the day</li>
                    <li>A curated collection for every mood and occasion</li>
                    <li>Elegant packaging for gifting or personal collection</li>
                </ul>

                <p><a href="{{ url('shop') }}" class="btn">Explore</a></p>
            </div>

        </div>
    </div>
</div>
<!-- End We Help Section -->

<!-- Start Popular Product Section -->
<div class="popular-product">
    <div class="container">
        <div class="row">

            @foreach($products as $product)
                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">

                    <div class="product-item-sm d-flex">

                        <div class="thumbnail">
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid">
                        </div>

                        <div class="pt-3">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit($product->description, 80) }}</p>
                            <p><a href="{{ url('cart') }}">Read More</a></p>
                        </div>

                    </div>

                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- End Popular Product Section -->

<!-- Start Testimonial Section -->
<div class="testimonial-section">
    <div class="container">

        <div class="row">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="section-title">Customer Reviews</h2>
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
                                                         class="img-fluid">
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

<!-- Start Blog Section -->
<div class="blog-section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-md-6">
                <h2 class="section-title">Recent Blog</h2>
            </div>

            <div class="col-md-6 text-start text-md-end">
                <a href="{{ url('blog') }}" class="more">View All Posts</a>
            </div>
        </div>

        <div class="row">

            @foreach($blogs as $blog)
                <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">

                    <div class="post-entry">

                        <a href="{{ url('blog/' . $blog->slug) }}" class="post-thumbnail">
                            <img src="{{ asset('storage/' . $blog->image) }}"
                                 alt="{{ $blog->title }}" class="img-fluid">
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

@endsection
