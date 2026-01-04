@extends('layouts.admin')

@section('content')
<h2 class="fw-semibold mb-4">Manage Coupons</h2>

<a href="{{ route('admin.coupons.create') }}" class="btn btn-primary mb-3">
    Add New Coupon
</a>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Code</th>
            <th>Type</th>
            <th>Value</th>
            <th>Usage</th>
            <th>Status</th>
            <th>Expired</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($coupons as $coupon)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $coupon->code }}</td>
            <td>{{ ucfirst($coupon->type) }}</td>
            <td>
                {{ $coupon->type === 'percent' ? $coupon->value.'%' : 'Rp '.number_format($coupon->value,0,',','.') }}
            </td>
            <td>{{ $coupon->used }} / {{ $coupon->usage_limit ?? '∞' }}</td>
            <td>{{ $coupon->is_active ? 'Active' : 'Inactive' }}</td>
            <td>{{ $coupon->expired_at ?? '-' }}</td>
            <td>
                <a href="{{ route('admin.coupons.edit', $coupon->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('admin.coupons.destroy', $coupon->id) }}"
                      method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger"
                        onclick="return confirm('Delete this coupon?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
