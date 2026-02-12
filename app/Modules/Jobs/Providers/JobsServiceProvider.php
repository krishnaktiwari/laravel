<?php

namespace App\Modules\Jobs\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route; // ✅ ADD THIS

class JobsServiceProvider extends ServiceProvider {

    public function boot(): void {
        // Load Views (jobs::index)
        $this->loadViewsFrom(__DIR__ . "/../Views", "jobs");

        $this->mapModuleRoutes();
    }

    public function register(): void {
        //
    }

    protected function mapModuleRoutes(): void {
        $routesPath = app_path('Modules/Jobs/Routes/web.php');

        Route::domain('jobnidhi.com')
                ->middleware('web')
                ->group($routesPath);
        Route::domain('vinayakjobs.com')
                ->middleware('web')
                ->group($routesPath);

                Route::domain('jobs.sarva.one')
                ->middleware('web')
                ->group($routesPath);
    }
}