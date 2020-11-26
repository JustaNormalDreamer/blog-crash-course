<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::where('status', 1)->latest()->get();
        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
//        $post = Post::findOrFail($post);
////        Post::where('id', $post)->get();
//        dd($post->title);
        return view('blog.show', compact('post'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'status' => 'required|boolean'
        ]);

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->route('posts.index')->with('message', 'Post has been created.');
    }
}
