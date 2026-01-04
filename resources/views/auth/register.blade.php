@extends('layouts.app')

@section('title', 'Register | Noiré')

@section('content')
<div class="container py-5">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-6 d-none d-md-block text-center">
            <img src="{{ asset('assets/images/parfum-hero.png') }}" alt="Parfum Hero" class="img-fluid" style="max-width: 80%; height: auto;">
        </div>
        <div class="col-md-5">
            <div class="card shadow-sm border-0 p-4 rounded-4">
                <h2 class="mb-4 text-center fw-bold">Create a New Account</h2>
                <form action="{{ route('register.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-secondary w-100 py-2">Register</button>

                    <p class="text-center mt-3 mb-0">
                        Already have an account? <a href="{{ url('/login') }}" class="text-decoration-none text-dark fw-semibold">
                            Login here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
    @endsection
