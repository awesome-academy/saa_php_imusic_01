<?php

namespace App\Providers;

use App\Models\Album;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('web._partial.wrapper', function ($view) {
            $hot_albums = Album::orderBy('count', 'DESC')->take(12)->get();
            $view->with('hot_albums', $hot_albums);
        });
        View::composer('web._partial.leftside', function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);
        });
    }
}
