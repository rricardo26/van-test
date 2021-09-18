<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->when(\App\Console\Commands\InsertUsers::class)
            ->needs(\App\Repositories\User\UserRepositoryInterface::class)
            ->give(\App\Repositories\User\UserRepository::class);

        $this->app->when(\App\Http\Controllers\UserController::class)
            ->needs(\App\Repositories\User\UserRepositoryInterface::class)
            ->give(\App\Repositories\User\UserRepository::class);

        $this->app->when(\App\Console\Commands\InsertPosts::class)
            ->needs(\App\Repositories\Post\PostRepositoryInterface::class)
            ->give(\App\Repositories\Post\PostRepository::class);

        $this->app->when(\App\Console\Commands\InsertRandomComment::class)
            ->needs(\App\Repositories\Post\PostRepositoryInterface::class)
            ->give(\App\Repositories\Post\PostRepository::class);

        $this->app->when(\App\Console\Commands\InsertRandomComment::class)
            ->needs(\App\Repositories\Comment\CommentRepositoryInterface::class)
            ->give(\App\Repositories\Comment\CommentRepository::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
