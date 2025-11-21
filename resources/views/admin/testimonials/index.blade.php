@extends('layouts.admin')

@section('content')
<h2 class="fw-semibold mb-4">Manage Testimonials</h2>

<a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary mb-3">Add New Testimonial</a>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Position</th>
            <th>Content</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($testimonials as $testimonial)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $testimonial->name }}</td>
            <td>{{ $testimonial->position }}</td>
            <td>{{ Str::limit($testimonial->content, 50) }}</td>
            <td>
                @if($testimonial->photo)
                <img src="{{ asset('storage/'.$testimonial->photo) }}" width="50">
                @endif
            </td>
            <td>
                <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this testimonial?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
