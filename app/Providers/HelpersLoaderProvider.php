<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelpersLoaderProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
            require_once app_path().'/Helpers/Zakaz.php';

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
