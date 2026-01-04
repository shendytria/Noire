@extends('layouts.admin')

@section('content')
<h2 class="fw-semibold mb-4">Edit Coupon</h2>

<form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Coupon Code</label>
        <input type="text" name="code" value="{{ $coupon->code }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Type</label>
        <select name="type" class="form-control">
            <option value="fixed" {{ $coupon->type=='fixed'?'selected':'' }}>Fixed</option>
            <option value="percent" {{ $coupon->type=='percent'?'selected':'' }}>Percent</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Value</label>
        <input type="number" name="value" value="{{ $coupon->value }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Usage Limit</label>
        <input type="number" name="usage_limit" value="{{ $coupon->usage_limit }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Expired At</label>
        <input type="date" name="expired_at" value="{{ $coupon->expired_at }}" class="form-control">
    </div>

    <button class="btn btn-primary">Update Coupon</button>
</form>
@endsection
