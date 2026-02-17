<?php

namespace App\Modules\Blog\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route; 

class BlogServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . "/../Views", "Blog");

        $this->mapModuleRoutes();
    }

    public function register(): void
    {
        //
    }

    protected function mapModuleRoutes(): void
    {
        //$this->loadRoutesFrom(__DIR__ . "/../Routes/web.php");
        
        $routesPath = app_path('Modules/Blog/Routes/web.php');

        Route::domain('blog.sarva.one')
            ->middleware('web')
            ->group($routesPath);
        
    }
}