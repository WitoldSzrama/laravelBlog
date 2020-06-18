<?php

namespace App\Services;

use App\Http\Requests\PostsRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostsServices
{
    public static function createPost(PostsRequest $request): Post
    {
        $data = $request->validated();
        $tags = self::prepareTags($request->request->get('tags'));

        $data['user_id'] = Auth::id();
        $post = Post::create($data);
        $post->tags()->attach($tags);

        return $post;
    }

    public static function updatePost(PostsRequest $request, Post $post)
    {
        $data = $request->validated();
        $tags = self::prepareTags($request->request->get('tags'));
        $post->update($data);
        $post->tags()->sync($tags);

        return $post;
    }


    private static function prepareTags(string $tags) : array
    {
        $tags = strtolower($tags);

        $tagsArray = explode(' ', $tags);

        $tagsObjectArray = [];
        foreach ($tagsArray as $tag)
        {
            if ($oldTag = Tag::where(['tag' => $tag])->first())
            {
                $tagsObjectArray[] = $oldTag->id;
            } else {
                $tagsObjectArray[] = Tag::create(['tag' => $tag])->id;
            }
        }

        return $tagsObjectArray;
    }

}
