<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Jobs\Controllers\HomeController;

use App\Modules\Jobs\Controllers\SeoController;

/*
Route::prefix('jobs')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
});
*/

Route::get('/', [HomeController::class, 'index']);

/*
|--------------------------------------------------------------------------
| SEO Routes
|--------------------------------------------------------------------------
*/
Route::get('/sitemap.xml', [SeoController::class, 'sitemap']);