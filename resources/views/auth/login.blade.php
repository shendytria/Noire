@extends('layouts.app')

@section('title', 'Login | Noiré')

@section('content')
<div class="container py-5">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-6 d-none d-md-block text-center">
            <img src="{{ asset('assets/images/parfum-hero.png') }}" alt="Parfum Hero" class="img-fluid" style="max-width: 80%; height: auto;">
        </div>
        <div class="col-md-5">
            <div class="card shadow-sm border-0 p-4 rounded-4">
                <h2 class="mb-4 text-center fw-bold">Login to Your Account</h2>

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>

                    <button type="submit" class="btn btn-secondary w-100 py-2">Login</button>

                    <p class="text-center mt-3 mb-0">
                        Don’t have an account?
                        <a href="{{ url('/register') }}" class="text-decoration-none text-dark fw-semibold">
                            Register here
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
