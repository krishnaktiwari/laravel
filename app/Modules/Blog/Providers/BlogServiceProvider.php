<?php

namespace App\Modules\Blog\Providers;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Load Routes
        $this->loadRoutesFrom(__DIR__ . "/../Routes/web.php");

        // Load Views (blog::index)
        $this->loadViewsFrom(__DIR__ . "/../Views", "blog");
    }

    public function register(): void
    {
        //
    }
}
