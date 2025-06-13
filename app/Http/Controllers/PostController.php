<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Ensure you have the correct namespace for your Post model


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    public function createform()
    {
        return view('posts.create');
    }
    public function store(Request $request){
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $post = new Post();
        $post->title = $request->title;
        $post->image_path = $imagePath;
        $post->body = $request->body;
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

}
