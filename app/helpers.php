<?php

use App\Supports\Core;
use App\Supports\Setting;
use Illuminate\Contracts\Container\BindingResolutionException;

if (!function_exists('core')) {
    /**
     * @throws BindingResolutionException
     */
    function core()
    {
        return app()->make(Core::class);
    }
}

if (!function_exists('setting')) {
    /**
     * Helper function for Setting facade.
     *
     * @param string $key
     * @param mixed $default
     * @param string $constraint_value
     * @return mixed
     */
    function setting()
    {

        return  app()->make(Setting::class);
    }
}


require_once __DIR__ . '/Helpers/common.php';
