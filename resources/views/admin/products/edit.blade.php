@extends('layouts.admin')

@section('content')
<h2 class="fw-semibold mb-4">Edit Product</h2>

<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Product Name</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Image</label>
        @if($product->image)
        <div class="mb-2">
            <img src="{{ asset('storage/'.$product->image) }}" width="80">
        </div>
        @endif
        <input type="file" name="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
