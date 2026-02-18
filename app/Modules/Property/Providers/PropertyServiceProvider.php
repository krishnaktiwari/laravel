<?php

namespace App\Modules\Property\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Route;
class PropertyServiceProvider extends ServiceProvider
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
        $this->registerRoutes();
        $this->registerViews();
    }

    /**
     * Load Property Module Routes
     */
    private function registerRoutes(): void
    {
        $this->loadRoutesFrom(
            __DIR__ . '/../Routes/web.php'
        );
    }

    /**
     * Load Property Module Views
     */
    private function registerViews(): void
    {
        $this->loadViewsFrom(
            __DIR__ . '/../Views',
            'Property'
        );

        /*
        Route::domain('property.sarva.one')
            ->middleware('web')
            ->group(__DIR__ . '/../Routes/web.php');
            */
    }
}