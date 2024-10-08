<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view("posts.index", compact("posts"));
    }
    public function create()
    {
        return view("posts.create");
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|max:255', // Title is required and has a maximum length
            'content' => 'required', // Content is required
        ]);

        // Use only title and content for mass assignment
        // Post::create($request->only(['title', 'content'])); // This excludes '_token'
        $new = new Post;
        $new->title = $request->title;
        $new->content = $request->content;
        $new->save();
        return redirect()->route('posts.index'); // Redirect after saving
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|max:255', // Title is required and has a maximum length
            'content' => 'required', // Content is required
        ]);

        $post = Post::findOrFail($id); // Find the post by ID
        $post->update($request->only(['title', 'content'])); // Update only title and content
        return redirect()->route('posts.index'); // Redirect after updating
    }
    public function edit(Request $request, $id)
    {
        $post = Post::findOrFail($id); // Find the post by ID
        return view("posts.edit", compact("post"));
    }
    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id); // Find the post by ID
        $post->delete();
        return redirect()->route("posts.index");
    }
    public function show(Request $request, $id)
    {
        $post = Post::findOrFail($id); // Find the post by ID
        return view("posts.show", compact("post"));
    }
}


