@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Edit Post</h2>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-warning text-white text-center">
                        <h4>Edit Post</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Content</label>
                                <textarea name="content" class="form-control" required>{{ $post->content }}</textarea>
                            </div>

                            <!-- Show Existing Image -->
                            <div class="mb-3 text-center">
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" 
                                         class="img-thumbnail rounded" 
                                         style="width: 150px; height: 120px; object-fit: cover;">
                                @else
                                    <p class="text-muted">No image available</p>
                                @endif
                            </div>

                            <!-- Upload New Image -->
                            <div class="mb-3">
                                <label class="form-label">Upload New Image (Optional)</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Post
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
