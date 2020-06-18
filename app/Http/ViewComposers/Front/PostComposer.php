<?php

namespace App\Http\ViewComposers\Front;

use App\Models\Post;
use Illuminate\View\View;

class PostComposer
{
    public function compose(View $view)
    {
        $view->with('posts', Post::orderBy('updated_at', 'DESC')->paginate(10));
    }
}
