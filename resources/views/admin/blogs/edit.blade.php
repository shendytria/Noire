@extends('layouts.admin')

@section('content')
<h2 class="fw-semibold mb-4">Edit Blog</h2>

<form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Author</label>
        <input type="text" name="author" class="form-control" value="{{ old('author', $blog->author) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea name="content" class="form-control" rows="6" required>{{ old('content', $blog->content) }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="imageInput">
        @if($blog->image)
            <img id="imagePreview" src="{{ asset('storage/'.$blog->image) }}" alt="Current Image" style="margin-top:10px; max-width:150px;">
        @else
            <img id="imagePreview" src="#" alt="Preview" style="display:none; margin-top:10px; max-width:150px;">
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

<script>
document.getElementById('imageInput').addEventListener('change', function(event){
    const [file] = event.target.files;
    if(file){
        const preview = document.getElementById('imagePreview');
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    }
});
</script>
@endsection
