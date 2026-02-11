<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     */
    public function register(): void {
        $this->registerModules();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        //
    }

    private function registerModules(): void {
        $modulesPath = app_path("Modules");

        // If Modules folder doesn't exist, skip
        if (!is_dir($modulesPath)) {
            return;
        }

        // Scan each module folder
        $modules = scandir($modulesPath);

        foreach ($modules as $module) {

            if ($module === "." || $module === "..") {
                continue;
            }

            $providerClass = "App\\Modules\\{$module}\\Providers\\{$module}ServiceProvider";

            // Check class exists before registering
            if (class_exists($providerClass)) {
                $this->app->register($providerClass);
            }
        }
    }
}
