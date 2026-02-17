<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Blog\Controllers\HomeController;

use App\Modules\Blog\Controllers\SeoController;

/*
Route::prefix('blog')->group(function () {
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