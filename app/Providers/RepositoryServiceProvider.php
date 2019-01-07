<?php

namespace App\Providers;

use App\Repositories\Contracts\PostRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\RDBMS\PostRepository;
use App\Repositories\RDBMS\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
    }

}
