@extends('layout')

@section('content')
    <h1 class="mt-5">Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create Post</a>
    <div class="list-group">
        @foreach ($posts as $post)
            <div class="list-group-item">
                <h5 class="mb-1">{{ $post->title }}</h5>
                <p class="mb-1">{{ Str::limit($post->content, 100) }}</p>
                <small>Created at: {{ $post->created_at->format('d M Y') }}</small>
                <div class="mt-2">
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
