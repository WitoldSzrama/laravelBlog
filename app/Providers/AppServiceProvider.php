<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('front.posts.index', 'App\Http\ViewComposers\Front\PostComposer');
        View::composer('admin.posts.index', 'App\Http\ViewComposers\Admin\PostComposer');
    }
}
