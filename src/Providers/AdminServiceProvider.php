<?php

namespace Aldrumo\Admin\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::componentNamespace('Aldrumo\\Admin\\View\\Components', 'Admin');

        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'Admin'
        );

        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/' . 'Admin'),
        ], 'aldrumo-Admin-views');

        $this->publishes(
            [
                __DIR__ . '/../../resources/dist' => public_path('aldrumo/admin'),
            ],
            'aldrumo-public'
        );
    }
}
