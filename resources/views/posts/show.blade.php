@extends('layout')

@section('content')
    <h1 class="mt-5">{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <small>Created at: {{ $post->created_at->format('d M Y') }}</small>
    <div class="mt-3">
        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
