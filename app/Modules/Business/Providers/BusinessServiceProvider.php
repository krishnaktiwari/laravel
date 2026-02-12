<?php

namespace App\Modules\Business\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route; // ✅ ADD THIS

class BusinessServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        // Load Views (business::index)
        $this->loadViewsFrom(__DIR__ . "/../Views", "business");
        $this->mapModuleRoutes();
    }

    public function register(): void
    {
        //
    }

    protected function mapModuleRoutes(): void
    {
        $routesPath = app_path('Modules/Business/Routes/web.php');

        Route::domain('sakti.biz')
            ->middleware('web')
            ->group($routesPath);
        Route::domain('business.sarva.one')
            ->middleware('web')
            ->group($routesPath);
    }
}
