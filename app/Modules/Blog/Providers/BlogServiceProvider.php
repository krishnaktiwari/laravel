<?php

namespace App\Modules\Blog\Providers;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Load Routes
        
        // Load Views (blog::index)
        $this->loadViewsFrom(__DIR__ . "/../Views", "blog");
        
        $this->mapModuleRoutes();
    }

    public function register(): void
    {
        //
    }
    
    protected function mapModuleRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__ . "/../Routes/web.php");
    }
}
