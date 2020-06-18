<?php

namespace App\Http\ViewComposers\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostComposer
{
    public function compose(View $view)
    {
        $view->with('posts', Post::where('user_id',Auth::id())->orderBy('updated_at', 'DESC')->paginate(10));
    }
}
