<?php

namespace Aldrumo\Admin\Providers;

use Aldrumo\Admin\AdminManager;
use Aldrumo\Admin\Contracts\AdminManager as AdminManagerContract;
use Aldrumo\Admin\Http\Livewire\PagesAdmin;
use Aldrumo\Admin\Http\Middleware;
use Aldrumo\Admin\Manager\MenuItem;
use Aldrumo\Admin\View\Composers\AdminMenu;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootLivewire();
        $this->bootMenu();
        $this->bootMiddleware();
        $this->bootPublishes();
        $this->bootRoutes();
        $this->bootViewComposers();
        $this->bootViews();
    }

    protected function bootLivewire()
    {
        Livewire::component('pages-admin', PagesAdmin::class);
    }

    protected function bootMenu()
    {
        $this->app[AdminManagerContract::class]
            ->menu()
            ->push(
                MenuItem::make('Dashboard', 'admin.dashboard', 0),
                MenuItem::make('Pages', 'admin.pages.index', 10),
            );
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

    protected function bootViewComposers()
    {
        View::composer(
            'Admin::navigation-dropdown',
            AdminMenu::class
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

    protected function registerBindings()
    {
        $this->app->singleton(
            AdminManagerContract::class,
            function ($app) {
                return new AdminManager(
                    collect([])
                );
            }
        );
    }
}
