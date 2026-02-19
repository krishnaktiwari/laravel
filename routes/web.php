<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SeoController;

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');

    // Legal
    Route::get('/privacy-policy', 'privacy_policy')->name('privacy-policy');
    Route::get('/terms-of-service', 'terms_of_service')->name('terms-of-service');
});
/*
|--------------------------------------------------------------------------
| Search Route
|--------------------------------------------------------------------------
*/
Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');



/*
|--------------------------------------------------------------------------
| SEO Routes
|--------------------------------------------------------------------------
*/
Route::controller(SeoController::class)->group(function () {
    Route::get('/robots.txt', 'robots')->name('robots');
    Route::get('/sitemap.xml', 'sitemap')->name('sitemap');
    Route::get('/sitemap-pages.xml', 'sitemap_pages')->name('sitemap.pages');
    Route::get('/ai-sitemap.xml', 'aiSitemap')->name('sitemap.ai');
    Route::get('/llms.txt', 'llms')->name('llms');
    Route::get('/llms-full.txt', 'llmsFull')->name('llms.full');
    Route::get('/ads.txt', 'adsTxt')->name('ads');
    Route::get('/app-ads.txt', 'appAdsTxt')->name('ads.app');
    Route::get('/humans.txt', 'humansTxt')->name('humans');
    Route::get('/.well-known/security.txt', 'securityTxt')->name('security');
});