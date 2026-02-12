<?php

namespace App\Modules\Property\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route; // ✅ ADD THIS

class PropertyServiceProvider extends ServiceProvider {

    public function boot(): void {
        // Load Views (property::index)
        $this->loadViewsFrom(__DIR__ . "/../Views", "property");

        $this->mapModuleRoutes();
    }

    public function register(): void {
        //
    }

    protected function mapModuleRoutes(): void {
        $routesPath = app_path('Modules/Property/Routes/web.php');

        Route::domain('vasudha.properties')
                ->middleware('web')
                ->group($routesPath);
        Route::domain('vasudha.sarva.one')
                ->middleware('web')
                ->group($routesPath);
    }
}
