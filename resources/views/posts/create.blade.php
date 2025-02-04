@extends('layout')

@section('content')
    <h1 class="mt-5">Create Post</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
