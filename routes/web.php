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
Route::get('/', [HomeController::class, 'index']);                // Home page
Route::get('/about-us', [HomeController::class, 'about_us']);     // About Us page
Route::get('/contact-us', [HomeController::class, 'contact_us']); // Contact Us page
Route::get('/portfolio', [HomeController::class, 'portfolio']);   // Portfolio page
Route::get('/faq', [HomeController::class, 'faq']);       // Careers page
Route::get('/careers', [HomeController::class, 'careers']); 
/*
|--------------------------------------------------------------------------
| Legal Pages Routes
|--------------------------------------------------------------------------
*/
Route::get('/privacy-policy', [HomeController::class, 'privacy_policy']);
Route::get('/terms-conditions', [HomeController::class, 'terms_conditions']);

/*
|--------------------------------------------------------------------------
| Form Submission Routes
|--------------------------------------------------------------------------
| Handles POST requests from forms
|--------------------------------------------------------------------------
*/
Route::post('/contact', [HomeController::class, 'contactForm']);          // Contact form submission
Route::post('/subscribe', [HomeController::class, 'subscribeNewsletter']); // Newsletter subscription

/*
|--------------------------------------------------------------------------
| SEO Routes
|--------------------------------------------------------------------------
| Robots.txt and Sitemap.xml
|--------------------------------------------------------------------------
*/
Route::get('/robots.txt', [SeoController::class, 'robots']);   // Dynamic robots.txt
Route::get('/sitemap.xml', [SeoController::class, 'sitemap']); // Dynamic sitemap.xml
