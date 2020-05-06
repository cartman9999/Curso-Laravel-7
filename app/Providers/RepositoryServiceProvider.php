<?php

namespace App\Providers;

use App\Repositories\{PostRepository, PostApiRepository};
use App\Repositories\Interfaces\{PostRepositoryInterface};
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
                    PostRepositoryInterface::class,
                    PostRepository::class
                );

        $this->app->bind(
                    PostRepositoryInterface::class,
                    PostApiRepository::class
                );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
