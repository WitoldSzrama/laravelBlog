<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentsRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(CommentsRequest $request, Post $post)
    {
        Comment::create($request->validated());

        return redirect('/posts/' . $post->id);
    }
}
