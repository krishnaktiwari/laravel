<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Property\Controllers\HomeController;

use App\Modules\Property\Controllers\SeoController;

/*
Route::prefix('property')->group(function () {
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