@extends('layouts.admin')

@section('content')
<h2 class="fw-semibold mb-4">Manage Products</h2>

<a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Add New Product</a>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ Str::limit($product->description, 50) }}</td>
            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
            <td>
                @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" width="50">
                @endif
            </td>
            <td>
                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
