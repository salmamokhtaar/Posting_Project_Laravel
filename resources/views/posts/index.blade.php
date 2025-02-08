@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">All Posts</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-success mb-3">
            <i class="fas fa-plus"></i> Create Post
        </a>

        @if($posts->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Image</th> <!-- ✅ Improved Image Column -->
                            <th>Actions</th>
                            <th>View Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ Str::limit($post->content, 50, '...') }}</td> <!-- Shorten content -->

                                <!-- ✅ Improved Image Display -->
                                <td>
                                    @if($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" 
                                             alt="Post Image" 
                                             class="img-thumbnail rounded" 
                                             style="width: 120px; height: 90px; object-fit: cover;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>

                                <!-- ✅ Actions (Edit & Delete) -->
                                <td>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>

                                <!-- ✅ View Details Button -->
                                <td>
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info text-center">No posts available. Create one!</div>
        @endif
    </div>
@endsection
