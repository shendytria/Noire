@extends('layouts.app')

@section('title', 'Checkout | Noiré')

@section('content')

@php
    $subtotal = $cart->items->sum(fn ($item) => $item->product->price * $item->quantity);
    $discount = session('coupon.value') ?? 0;
    $total = max($subtotal - $discount, 0);
@endphp

<!-- Hero -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Checkout</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="untree_co-section">
    <div class="container">
        <div class="row">

            <!-- LEFT -->
            <div class="col-md-6 mb-5">
                <h2 class="h3 mb-3 text-black">Billing Details</h2>
                <div class="p-3 p-lg-5 border bg-white">
                    <form id="billing-form">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" 
                                value="{{ auth()->user()->name }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" 
                                value="{{ auth()->user()->email }}" readonly>
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="ex: 081234567890" required>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" rows="3" class="form-control" placeholder="Street address" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" placeholder="City" required>
                        </div>

                        <div class="form-group">
                            <label>Postal Code</label>
                            <input type="text" name="postal_code" class="form-control" placeholder="ex: 12345" required>
                        </div>

                        <div class="form-group">
                            <label>Order Notes</label>
                            <textarea name="notes" rows="4" class="form-control" placeholder="Write your notes here..."></textarea>
                        </div>
                    </form>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="col-md-6">

                <!-- COUPON -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Coupon Code</h2>
                        <div class="p-3 p-lg-4 border bg-white">

                            @if(!session('coupon'))
                                <form method="POST" action="{{ route('checkout.coupon.apply') }}">
                                    @csrf
                                    <label class="mb-2">Enter your coupon code</label>
                                    <div class="input-group">
                                        <input type="text" name="coupon"
                                            class="form-control"
                                            placeholder="Coupon Code" required>
                                        <button class="btn btn-black btn-sm">Apply</button>
                                    </div>
                                </form>
                            @else
                                <div class="alert alert-success d-flex justify-content-between">
                                    <span>
                                        Coupon <strong>{{ session('coupon.code') }}</strong> applied
                                        (− Rp {{ number_format(session('coupon.value'),0,',','.') }})
                                    </span>

                                    <form method="POST" action="{{ route('checkout.coupon.remove') }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Remove</button>
                                    </form>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

                <!-- ORDER -->
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Your Order</h2>
                        <div class="p-3 p-lg-5 border bg-white">

                            <table class="table site-block-order-table mb-4">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($cart->items as $item)
                                    <tr>
                                        <td>
                                            {{ $item->product->name }}
                                            <strong class="mx-2">×</strong>
                                            {{ $item->quantity }}
                                        </td>
                                        <td class="text-right">
                                            Rp {{ number_format($item->product->price * $item->quantity,0,',','.') }}
                                        </td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td class="text-black"><strong>Subtotal</strong></td>
                                    <td class="text-right text-black">
                                        Rp {{ number_format($subtotal,0,',','.') }}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-black"><strong>Discount</strong></td>
                                    <td class="text-right text-black">
                                        − Rp {{ number_format($discount,0,',','.') }}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-black font-weight-bold">
                                        <strong>Order Total</strong>
                                    </td>
                                    <td class="text-right text-black font-weight-bold">
                                        <strong>
                                            Rp {{ number_format($total,0,',','.') }}
                                        </strong>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <button id="pay-button" class="btn btn-black btn-lg btn-block py-3">
                                Place Order & Pay
                            </button>

                            <script src="https://app.sandbox.midtrans.com/snap/snap.js"
                                data-client-key="{{ config('midtrans.clientKey') }}">
                            </script>

                            <script>
                                document.getElementById('pay-button').addEventListener('click', function (e) {
                                    e.preventDefault();

                                    // ambil data billing
                                    let form = document.getElementById('billing-form');
                                    let formData = new FormData(form);

                                    // kirim ke route checkout.process via AJAX
                                    fetch("{{ route('checkout.process') }}", {
                                        method: "POST",
                                        headers: {
                                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                                        },
                                        body: formData
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if(data.snapToken){
                                            snap.pay(data.snapToken, {
                                                onSuccess: function(result){
                                                    window.location.href = "/thankyou";
                                                },
                                                onPending: function(result){
                                                    alert("Waiting payment…");
                                                },
                                                onError: function(result){
                                                    alert("Payment failed");
                                                }
                                            });
                                        } else {
                                            alert("Checkout failed");
                                        }
                                    });
                                });
                            </script>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
