@extends('layouts.admin')

@section('content')
<h2 class="fw-semibold mb-4">Manage Blogs</h2>

<a href="{{ route('admin.blogs.create') }}" class="btn btn-primary mb-3">Add New Blog</a>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Content</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blogs as $blog)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->author }}</td>
            <td>{{ Str::limit($blog->content, 50) }}</td>
            <td>
                @if($blog->image)
                <img src="{{ asset('storage/'.$blog->image) }}" width="50">
                @endif
            </td>
            <td>
                <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this blog?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
