@extends('layouts.admin')

@section('content')
<h2 class="fw-semibold mb-4">Dashboard</h2>

<div class="row g-3">
    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h5>Total Products</h5>
                <p class="fs-4 fw-bold">{{ $productsCount }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h5>Total Users</h5>
                <p class="fs-4 fw-bold">{{ $usersCount }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h5>Total Blogs</h5>
                <p class="fs-4 fw-bold">{{ $blogsCount }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h5>Total Testimonials</h5>
                <p class="fs-4 fw-bold">{{ $testimonialsCount }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
