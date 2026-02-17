<?php

namespace App\Modules\Jobs\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class JobsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . "/../Views", "Jobs");

        $this->mapModuleRoutes();
    }

    public function register(): void
    {
        //
    }

    protected function mapModuleRoutes(): void
    {
        //$this->loadRoutesFrom(__DIR__ . "/../Routes/web.php");

        $routesPath = app_path('Modules/Jobs/Routes/web.php');

        Route::domain('jobs.sarva.one')
            ->middleware('web')
            ->group($routesPath);

    }
}