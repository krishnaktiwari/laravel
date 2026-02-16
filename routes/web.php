<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Public Pages Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])
    ->name('home.index');

Route::get('/about', [HomeController::class, 'about'])
    ->name('home.about');

Route::get('/contact', [HomeController::class, 'contact'])
    ->name('home.contact');



/*
|--------------------------------------------------------------------------
| Legal Pages Routes
|--------------------------------------------------------------------------
*/
Route::get('/privacy-policy', [HomeController::class, 'privacy_policy'])
    ->name('home.privacy');

Route::get('/terms-conditions', [HomeController::class, 'terms_conditions'])
    ->name('home.terms');


/*
|--------------------------------------------------------------------------
| Blog Routes
|--------------------------------------------------------------------------
*/
Route::get('/blog', [BlogController::class, 'index'])
    ->name('blog.index');

Route::get('/blog/{slug}', [BlogController::class, 'post'])
    ->name('blog.show');


/*
|--------------------------------------------------------------------------
| SEO Routes
|--------------------------------------------------------------------------
*/
Route::get('/robots.txt', [SeoController::class, 'robots'])
    ->name('seo.robots');

Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])
    ->name('seo.sitemap');

Route::get('/llms.txt', [SeoController::class, 'llms'])
    ->name('seo.llms');

Route::get('/ai-sitemap.xml', [SeoController::class, 'aiSitemap'])
    ->name('seo.ai-sitemap');
