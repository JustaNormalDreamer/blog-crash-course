<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::where('status', 1)->latest()->paginate(5);
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
//        $this->validate($request, [
//            'post_title' => 'required|string|max:255',
//            'post_description' => 'required',
//            'post_status' => 'required|boolean'
//        ]);
//
//        $post = Post::create([
//            'title' => $request->post_title,
//            'description' => $request->post_description,
//            'status' => $request->post_status
//        ]);

        $validatedData = $this->validatePostData();

        Post::create([
            'title' => $validatedData['post_title'],
            'description' => $validatedData['post_description'],
            'status' => $validatedData['post_status']
        ]);

        return redirect()->route('posts.index')->with('message', 'Post has been created.');
    }

    public function create(Post $post)
    {
        return view('blog.create', compact('post'));
    }

    public function update(Post $post) {

        $validatedData = $this->validatePostData();

        $post->update([
            'title' => $validatedData['post_title'],
            'description' => $validatedData['post_description'],
            'status' => $validatedData['post_status']
        ]);

//        $post->update([
//            'title' => $request->post_title,
//            'description' => $request->post_description,
//            'status' => $request->post_status
//        ]);

        return redirect()->route('posts.index')->with('message', 'Post has been updated.');
    }

    public function edit(Post $post)
    {
        return view('blog.edit', compact('post'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('message', 'Post has been deleted.');
    }

    //refactoring the validation
    private function validatePostData()
    {
        return request()->validate([
            'post_title' => 'required|string|max:255',
            'post_description' => 'required',
            'post_status' => 'required|boolean'
        ]);
    }
}
