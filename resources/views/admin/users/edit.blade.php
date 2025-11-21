@extends('layouts.admin')

@section('content')
<h2 class="fw-semibold mb-4">Edit User</h2>

<form action="{{ route('admin.users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Role</label>
        <select name="role" class="form-select" required>
            <option value="customer" {{ $user->role === 'customer' ? 'selected' : '' }}>Customer</option>
            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Password (Leave blank if not changing)</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
