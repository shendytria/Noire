@extends('layouts.app')

@section('title', 'Shop | Noiré')

@section('content')
<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Shop</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">

            @foreach($products as $product)
            <div class="col-12 col-md-4 col-lg-3 mb-5">

                <!-- Product Item -->
                <div class="product-item" style="cursor: pointer;"
                     data-bs-toggle="modal"
                     data-bs-target="#productModal{{ $product->id }}">

                    <img src="{{ asset('storage/' . $product->image) }}"
                            class="img-fluid product-thumbnail" 
                            alt="{{ $product->name }}"
                            style="width: 100%; height: 300px; object-fit: cover;">

                    <h3 class="product-title">{{ $product->name }}</h3>
                    <strong class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</strong>

                    <span class="icon-cross">
                        <img src="{{ asset('assets/images/cross.svg') }}" class="img-fluid">
                    </span>
                </div>

            </div>



            <!-- =======================
                 PRODUCT MODAL
            ========================== -->
            <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $product->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            <div class="row align-items-center">

                                <!-- Image -->
                                <div class="col-lg-6 mb-4">
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                         class="img-fluid rounded shadow" alt="">
                                </div>

                                <!-- Info -->
                                <div class="col-lg-6">
                                    <h3 class="mb-3">{{ $product->name }}</h3>

                                    <p class="text-muted mb-3" style="font-size: 1.1rem;">
                                        {{ $product->description }}
                                    </p>

                                    <h4 class="text-dark mb-4">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </h4>

                                    <button class="btn btn-primary px-4 py-2">
                                        <img src="{{ asset('assets/images/bag.svg') }}" width="18" class="me-2">
                                        Add to Cart
                                    </button>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END PRODUCT MODAL -->

            @endforeach

        </div>
    </div>
</div>

@endsection
