@extends('layouts.admin')

@section('content')
<h2 class="fw-semibold mb-4">Add New Coupon</h2>

<form action="{{ route('admin.coupons.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Coupon Code</label>
        <input type="text" name="code" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Type</label>
        <select name="type" class="form-control">
            <option value="fixed">Fixed (Rp)</option>
            <option value="percent">Percent (%)</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Value</label>
        <input type="number" name="value" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Usage Limit</label>
        <input type="number" name="usage_limit" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Expired At</label>
        <input type="date" name="expired_at" class="form-control">
    </div>

    <button class="btn btn-primary">Save Coupon</button>
</form>
@endsection
