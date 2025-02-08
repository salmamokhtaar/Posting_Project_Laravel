@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-info text-white text-center">
                <h3>{{ $post->title }}</h3>
            </div>
            <div class="card-body text-center">

                <!-- ✅ Display Post Image -->
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" 
                         class="img-fluid rounded mb-3" 
                         style="max-width: 100%; height: auto; object-fit: cover;">
                @else
                    <p class="text-muted">No image available</p>
                @endif

                <p>{{ $post->content }}</p>

                <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    </div>
@endsection
