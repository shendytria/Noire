@extends('layouts.admin')

@section('content')
<h2 class="fw-semibold mb-4">Add New Testimonial</h2>

<form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Position</label>
        <input type="text" name="position" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea name="content" class="form-control" rows="4" required></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Photo</label>
        <input type="file" name="photo" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
