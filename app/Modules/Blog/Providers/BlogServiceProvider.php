<?php

namespace App\Modules\Blog\Providers;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
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
     * Load Blog Module Routes
     */
    private function registerRoutes(): void
    {
        $this->loadRoutesFrom(
            __DIR__ . '/../Routes/web.php'
        );
    }

    /**
     * Load Blog Module Views
     */
    private function registerViews(): void
    {
        $this->loadViewsFrom(
            __DIR__ . '/../Views',
            'Blog'
        );
    }
}