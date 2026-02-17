<?php

namespace App\Modules\Business\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class BusinessServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . "/../Views", "Business");

        $this->mapModuleRoutes();
    }

    public function register(): void
    {
        //
    }

    protected function mapModuleRoutes(): void
    {
        //$this->loadRoutesFrom(__DIR__ . "/../Routes/web.php");

        $routesPath = app_path('Modules/Business/Routes/web.php');

        Route::domain('business.sarva.one')
            ->middleware('web')
            ->group($routesPath);

    }
}