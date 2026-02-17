<?php

namespace App\Modules\Property\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class PropertyServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . "/../Views", "Property");

        $this->mapModuleRoutes();
    }

    public function register(): void
    {
        //
    }

    protected function mapModuleRoutes(): void
    {
        //$this->loadRoutesFrom(__DIR__ . "/../Routes/web.php");

        $routesPath = app_path('Modules/Property/Routes/web.php');

        Route::domain('property.sarva.one')
            ->middleware('web')
            ->group($routesPath);

    }
}