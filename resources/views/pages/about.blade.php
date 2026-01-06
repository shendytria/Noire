@extends('layouts.app')

@section('title', 'About Us | Noiré')

@section('content')
<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>About Us</h1>
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
                    <img src="{{ asset('assets/images/parfum-hero.png') }}" class="img-fluid" alt="Parfum Hero" style="transform: scale(1.1); transform-origin: center right; pointer-events: none; margin-left: 150px; margin-top: 60px;">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

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
                    <img src="{{ asset('assets/images/why-choose-us-imgs.jpg') }}" class="img-fluid">
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Why Choose Us Section -->

<!-- Start Founder Section -->
<div class="untree_co-section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-lg-5 mx-auto text-center">
                <h2 class="section-title">Our Founder</h2>
            </div>
        </div>

        <div class="row justify-content-center">

            <!-- Founder Column -->
            <div class="col-12 col-md-6 col-lg-4 text-center">
                <img src="{{ asset('assets/images/person_1.jpeg') }}" class="img-fluid mb-4" style="width:200px;height:200px;object-fit:cover;border-radius:5px;" alt="Shendy Tria Amelyana">

                <h3>
                    <span>Shendy Tria</span> Amelyana
                </h3>

                <span class="d-block position mb-3">
                    Founder & Creative Director
                </span>

                <p>
                    Shendy Tria Amelyana is the founder of <strong>Noiré</strong>, a perfume brand born from a passion for timeless elegance and modern sophistication.
                    Noiré is crafted to tell stories through scent—each fragrance carefully composed to evoke emotion,
                    confidence, and individuality. With a strong focus on quality, aesthetics, and experience,
                    Noiré aims to redefine everyday luxury through perfume.
                </p>
            </div>
            <!-- End Founder Column -->

        </div>
    </div>
</div>
<!-- End Founder Section -->

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
