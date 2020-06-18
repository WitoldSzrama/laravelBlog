<?php

namespace App\Http\Controllers\Front;

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
        return view('front.posts.index');
    }

    public function show(Post $post)
    {
        $comments = $post->comments()->orderBy('created_at', 'DESC')->paginate(3);
        return view('front.posts.show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }
}
