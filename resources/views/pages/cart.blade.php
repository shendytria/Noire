@extends('layouts.app')

@section('title', 'Cart | Noiré')

@section('content')

@php
    $subtotal = $cart
        ? $cart->items->sum(fn ($item) => $item->product->price * $item->quantity)
        : 0;
@endphp

<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Cart</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section before-footer-section">
    <div class="container">

        <!-- Cart Table -->
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="site-blocks-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($cart?->items ?? [] as $item)
                            <tr>
                                <td class="product-thumbnail">
                                    <img
                                        src="{{ asset('storage/' . $item->product->image) }}"
                                        alt="{{ $item->product->name }}"
                                        class="img-fluid"
                                        style="max-width: 80px;"
                                    >
                                </td>

                                <td class="product-name">
                                    <h2 class="h5 text-black mb-0">
                                        {{ $item->product->name }}
                                    </h2>
                                </td>

                                <td>
                                    Rp {{ number_format($item->product->price, 0, ',', '.') }}
                                </td>

                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <!-- Decrease -->
                                        <form action="{{ route('cart.decrease', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-outline-black btn-sm">−</button>
                                        </form>

                                        <span class="mx-3">{{ $item->quantity }}</span>

                                        <!-- Increase -->
                                        <form action="{{ route('cart.increase', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-outline-black btn-sm">+</button>
                                        </form>
                                    </div>
                                </td>

                                <td>
                                    Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                                </td>

                                <td>
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-black btn-sm">X</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <h4>Cart is empty</h4>
                                    <a href="{{ url('/shop') }}" class="btn btn-outline-black mt-3">
                                        Continue Shopping
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Cart Totals -->
        @if ($cart && $cart->items->count())
        <div class="row">
            <div class="col-md-6">
                <a href="{{ url('/shop') }}" class="btn btn-outline-black btn-sm">
                    Continue Shopping
                </a>
            </div>

            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">

                        <div class="row mb-3">
                            <div class="col-md-12 text-right border-bottom mb-3">
                                <h3 class="text-black h4 text-uppercase">
                                    Cart Totals
                                </h3>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <span class="text-black">Subtotal</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">
                                    Rp {{ number_format($subtotal, 0, ',', '.') }}
                                </strong>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <span class="text-black">Total</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">
                                    Rp {{ number_format($subtotal, 0, ',', '.') }}
                                </strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a
                                    href="{{ url('/checkout') }}"
                                    class="btn btn-black btn-lg py-3 btn-block"
                                >
                                    Proceed To Checkout
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>

@endsection
