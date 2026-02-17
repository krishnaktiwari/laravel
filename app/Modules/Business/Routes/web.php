<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Business\Controllers\HomeController;

use App\Modules\Business\Controllers\SeoController;

/*
Route::prefix('business')->group(function () {
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