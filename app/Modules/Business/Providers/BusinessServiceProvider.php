<?php

namespace App\Modules\Business\Providers;

use Illuminate\Support\ServiceProvider;

class BusinessServiceProvider extends ServiceProvider
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
     * Load Business Module Routes
     */
    private function registerRoutes(): void
    {
        $this->loadRoutesFrom(
            __DIR__ . '/../Routes/web.php'
        );
    }

    /**
     * Load Business Module Views
     */
    private function registerViews(): void
    {
        $this->loadViewsFrom(
            __DIR__ . '/../Views',
            'Business'
        );
    }
}