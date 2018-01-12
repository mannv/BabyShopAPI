<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\BannerRepository::class, \App\Repositories\BannerRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CategoryRepository::class, \App\Repositories\CategoryRepositoryEloquent::class);
        //:end-bindings:
    }
}
