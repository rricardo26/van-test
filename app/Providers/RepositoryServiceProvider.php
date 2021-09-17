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