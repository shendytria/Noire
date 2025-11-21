@extends('layouts.admin')

@section('content')
<h2 class="fw-semibold mb-4">Edit Testimonial</h2>

<form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $testimonial->name) }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Position</label>
        <input type="text" name="position" class="form-control" value="{{ old('position', $testimonial->position) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea name="content" class="form-control" rows="4" required>{{ old('content', $testimonial->content) }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Photo</label>
        @if($testimonial->photo)
            <div class="mb-2">
                <img src="{{ asset('storage/'.$testimonial->photo) }}" width="100" alt="Current Photo">
            </div>
        @endif
        <input type="file" name="photo" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
