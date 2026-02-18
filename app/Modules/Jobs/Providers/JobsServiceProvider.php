<?php

namespace App\Modules\Jobs\Providers;

use Illuminate\Support\ServiceProvider;

class JobsServiceProvider extends ServiceProvider
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
     * Load Jobs Module Routes
     */
    private function registerRoutes(): void
    {
        $this->loadRoutesFrom(
            __DIR__ . '/../Routes/web.php'
        );
    }

    /**
     * Load Jobs Module Views
     */
    private function registerViews(): void
    {
        $this->loadViewsFrom(
            __DIR__ . '/../Views',
            'Jobs'
        );
    }
}