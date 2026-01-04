@extends('layouts.app')

@section('title', 'Services | Noiré')

@section('content')
<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Services</h1>
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


<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
    <div class="container">

        <div class="row my-5">
            <div class="col-6 col-md-6 col-lg-3 mb-4">
                <div class="feature">
                    <div class="icon">
                        <img src="{{ asset('assets/images/truck.svg') }}" alt="Image" class="img-fluid">
                    </div>
                    <h3>Free Worldwide Shipping</h3>
                    <p>We ship your fragrance worldwide at no extra cost.</p>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-4">
                <div class="feature">
                    <div class="icon">
                        <img src="{{ asset('assets/images/bag.svg') }}" alt="Image" class="img-fluid">
                    </div>
                    <h3>Easy to Find Your Scent</h3>
                    <p>Find your favorite aroma easily from our curated collection.</p>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-4">
                <div class="feature">
                    <div class="icon">
                        <img src="{{ asset('assets/images/support.svg') }}" alt="Image" class="img-fluid">
                    </div>
                    <h3>24/7 Customer Support</h3>
                    <p>Our team is ready to assist you anytime.</p>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-4">
                <div class="feature">
                    <div class="icon">
                        <img src="{{ asset('assets/images/return.svg') }}" alt="Image" class="img-fluid">
                    </div>
                    <h3>Easy Returns & Exchanges</h3>
                    <p>Enjoy a hassle-free return and exchange process.</p>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-4">
                <div class="feature">
                    <div class="icon">
                        <img src="{{ asset('assets/images/truck.svg') }}" alt="Image" class="img-fluid">
                    </div>
                    <h3>Free Worldwide Shipping</h3>
                    <p>We ship your fragrance worldwide at no extra cost.</p>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-4">
                <div class="feature">
                    <div class="icon">
                        <img src="{{ asset('assets/images/bag.svg') }}" alt="Image" class="img-fluid">
                    </div>
                    <h3>Easy to Find Your Scent</h3>
                    <p>Find your favorite aroma easily from our curated collection.</p>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-4">
                <div class="feature">
                    <div class="icon">
                        <img src="{{ asset('assets/images/support.svg') }}" alt="Image" class="img-fluid">
                    </div>
                    <h3>24/7 Customer Support</h3>
                    <p>Our team is ready to assist you anytime.</p>
                </div>
            </div>

            <div class="col-6 col-md-6 col-lg-3 mb-4">
                <div class="feature">
                    <div class="icon">
                        <img src="{{ asset('assets/images/return.svg') }}" alt="Image" class="img-fluid">
                    </div>
                    <h3>Easy Returns & Exchanges</h3>
                    <p>Enjoy a hassle-free return and exchange process.</p>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- End Why Choose Us Section -->

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
                            class="img-fluid product-thumbnail" 
                            alt="{{ $product->name }}"
                            style="width: 100%; height: 300px; object-fit: cover;">

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
