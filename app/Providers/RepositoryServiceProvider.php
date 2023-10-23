<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->singleton(\App\Repositories\Auth\Interface\AuthRepositoryInterface::class, \App\Repositories\Auth\Eloquent\AuthRepository::class);

        
    }
}
