<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SeoController;

/*
|--------------------------------------------------------------------------
| Public Pages Routes
|--------------------------------------------------------------------------
| These routes handle static and informational pages
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])
    ->name('home.home');

Route::get('/about-us', [HomeController::class, 'about_us'])
    ->name('about');

Route::get('/contact-us', [HomeController::class, 'contact_us'])
    ->name('contact');

/*
|--------------------------------------------------------------------------
| Legal Pages Routes
|--------------------------------------------------------------------------
*/
Route::get('/privacy-policy', [HomeController::class, 'privacy_policy'])
    ->name('privacy-policy');

Route::get('/terms-conditions', [HomeController::class, 'terms_conditions'])
    ->name('terms-conditions');

/*
|--------------------------------------------------------------------------
| Form Submission Routes
|--------------------------------------------------------------------------
| Handles POST requests from forms
|--------------------------------------------------------------------------
*/
Route::post('/contact', [HomeController::class, 'contactForm'])
    ->name('contact.submit');

/*
|--------------------------------------------------------------------------
| SEO Routes
|--------------------------------------------------------------------------
| Robots.txt and Sitemap.xml
|--------------------------------------------------------------------------
*/
Route::get('/robots.txt', [SeoController::class, 'robots'])
    ->name('seo.robots');

Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])
    ->name('seo.sitemap');

Route::get('/llms.txt', [SeoController::class, 'llms'])
    ->name('seo.llms');