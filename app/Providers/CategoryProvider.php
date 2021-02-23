<?php

namespace App\Providers;

use App\Category;

use View;
use Illuminate\Support\ServiceProvider;

class CategoryProvider extends ServiceProvider
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
        //
        View::composer('*', function ($view){
            $categories = Category::all();
            $view->with('categories', $categories);

        });
    }
}
