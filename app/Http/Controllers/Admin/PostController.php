<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostsRequest;
use App\Models\Post;
use App\Services\PostsServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        $post = new Post();

        return view('front.posts.create', ['post' => $post]);
    }

    public function store(PostsRequest $request)
    {

        PostsServices::createPost($request);

        return redirect('/')->with('message', 'Post created');
    }

    public function edit(Post $post)
    {
        return view('front.posts.edit', ['post' => $post]);
    }

    public function update(PostsRequest $request, Post $post)
    {
        PostsServices::updatePost($request, $post);

        return redirect('/')->with('message', 'Post edited');
    }

    public function delete(Post $post)
    {
        $post->delete();

        return redirect('/')->with('message', 'Post erased');
    }
}
