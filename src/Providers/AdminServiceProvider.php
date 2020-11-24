<?php

namespace Aldrumo\Admin\Providers;

use Aldrumo\Admin\Http\Middleware;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
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
        $this->bootMiddleware();
        $this->bootPublishes();
        $this->bootRoutes();
        $this->bootViews();
    }

    protected function bootMiddleware()
    {
        $this->app['router']->aliasMiddleware(
            'adminCheck',
            Middleware\AdminCheck::class
        );
    }

    protected function bootPublishes()
    {
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

    protected function bootRoutes()
    {
        Route::middleware(['web', 'auth:sanctum', 'verified', 'adminCheck',])
            ->group(
                function () {
                    $this->loadRoutesFrom(__DIR__ . '/../../routes/admin.php');
                }
            );
    }

    protected function bootViews()
    {
        Blade::componentNamespace('Aldrumo\\Admin\\View\\Components', 'Admin');

        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'Admin'
        );
    }
}
