<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
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
        View::composer(['backend.produit.index', 'backend.produit.create','backend.produit.edit'], function ($view) {
            $view->with('categories', Category::all());
            });
        Paginator::useBootstrap();
    }
}
