<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stringTags()
    {
        $array = $this->tags()->get(['tag'])->all();
        $tags = array_map(function ($tag) {
            return $tag->tag;
        }, $array);

        return implode(' ', $tags);
    }
}
