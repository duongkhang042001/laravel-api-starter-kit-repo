<?php

namespace App\Providers;

use App\Supports\Core;
use App\Supports\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('core', function () {
            return app()->make(Core::class);
        });

        $this->app->singleton('setting', function () {
            return app()->make(Setting::class);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
