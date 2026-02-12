<?php

namespace App\Modules\Kshititech\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route; // ✅ ADD THIS

class KshititechServiceProvider extends ServiceProvider {

    public function boot(): void {
        // Load Views (kshititech::index)
        $this->loadViewsFrom(__DIR__ . "/../Views", "kshititech");

        $this->mapModuleRoutes();
    }

    public function register(): void {
        //
    }

    protected function mapModuleRoutes(): void {
        $routesPath = app_path('Modules/Kshititech/Routes/web.php');

        Route::domain('kshititechnologies.com')
                ->middleware('web')
                ->group($routesPath);

        Route::domain('kshititech.com')
                ->middleware('web')
                ->group($routesPath);

        Route::domain('kshititech.in')
                ->middleware('web')
                ->group($routesPath);

        Route::domain('pradakshina.in')
                ->middleware('web')
                ->group($routesPath);

        Route::domain('shubhkamna.co.in')
                ->middleware('web')
                ->group($routesPath);

        Route::middleware('web')
                ->prefix('kshititech')
                ->group($routesPath);
    }
}
