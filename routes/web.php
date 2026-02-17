<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\SeoController;


/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about-us', 'about_us')->name('about-us');
    Route::get('/contact-us', 'contact_us')->name('contact-us');

    // Legal
    Route::get('/privacy-policy', 'privacy_policy')->name('privacy-policy');
    Route::get('/terms-of-service', 'terms_of_service')->name('terms-of-service');
});




/*
|--------------------------------------------------------------------------
| SEO Routes
|--------------------------------------------------------------------------
*/
Route::controller(SeoController::class)->group(function () {
    Route::get('/robots.txt',               'robots')->name('robots');
    Route::get('/sitemap.xml',              'sitemap')->name('sitemap');
    Route::get('/sitemap-pages.xml',        'sitemap_pages')->name('sitemap.pages');
    Route::get('/ai-sitemap.xml',           'aiSitemap')->name('sitemap.ai');
    Route::get('/llms.txt',                 'llms')->name('llms');
    Route::get('/llms-full.txt',            'llmsFull')->name('llms.full');
    Route::get('/ads.txt',                  'adsTxt')->name('ads');
    Route::get('/app-ads.txt',              'appAdsTxt')->name('ads.app');
    Route::get('/humans.txt',               'humansTxt')->name('humans');
    Route::get('/.well-known/security.txt', 'securityTxt')->name('security');
});

/*
|--------------------------------------------------------------------------
| Assets Routes
|--------------------------------------------------------------------------
*/
Route::controller(AssetsController::class)->group(function () {
    Route::get('/assets/logo.svg', 'logo')->name('assets.logo');
});