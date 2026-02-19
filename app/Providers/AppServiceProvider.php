<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach (glob(base_path('modules/*/Providers/*ServiceProvider.php')) as $provider) {
            $class = 'Modules\\'
                . basename(dirname(dirname($provider)))
                . '\\Providers\\'
                . basename($provider, '.php');

            if (class_exists($class)) {
                $this->app->register($class);
            }
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}