<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\UserService');
        $this->app->bind('App\Services\PostService');
        $this->app->bind('App\Services\MyPickService');
        $this->app->bind('App\Services\FacebookService');
        $this->app->bind('App\Services\LikeService');
    }
}
