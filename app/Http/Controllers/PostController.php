<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Show all posts
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Show the create form
    public function create()
    {
        return view('posts.create');
    }

    // Store a new post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index');
    }


    // Show the edit form
public function edit(Post $post)
{
    return view('posts.edit', compact('post'));
}

// Update post
public function update(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
    ]);

    $post->update([
        'title' => $request->title,
        'content' => $request->content,
    ]);

    return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
}

// Delete post
public function destroy(Post $post)
{
    $post->delete();
    return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
}

}
