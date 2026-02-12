<?php

use Illuminate\Support\Facades\Route;

use App\Modules\Property\Controllers\HomeController;
use App\Modules\Property\Controllers\SeoController;
use App\Modules\Property\Controllers\ServicesController;
use App\Modules\Property\Controllers\BlogController;

use App\Modules\Property\Controllers\AssetsController;

// routes/web.php

// Logo
Route::get('/assets/logo', [AssetsController::class, 'logo'])->name('assets.logo');

// Avatar
Route::get('/assets/avatar/{name}', [AssetsController::class, 'avatar'])->name('assets.avatar');

// Placeholder
Route::get('/assets/placeholder/{width}/{height?}', [AssetsController::class, 'placeholder'])->name('assets.placeholder');

// Icon
Route::get('/assets/icon/{type?}', [AssetsController::class, 'icon'])->name('assets.icon');

// Pattern
Route::get('/assets/pattern', [AssetsController::class, 'pattern'])->name('assets.pattern');

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
Route::get('/careers', [HomeController::class, 'careers']);       // Careers page

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
/*
|--------------------------------------------------------------------------
| Blog Routes
|--------------------------------------------------------------------------
| Blog listing and single blog post
|--------------------------------------------------------------------------
*/
Route::get('/blog', [BlogController::class, 'index']);   // Blog listing page
Route::get('/blog/{slug}', [BlogController::class, 'post']); // Single blog post page

/*
|--------------------------------------------------------------------------
| SEO Routes
|--------------------------------------------------------------------------
| Robots.txt and Sitemap.xml
|--------------------------------------------------------------------------
*/
Route::get('/robots.txt', [SeoController::class, 'robots']);   // Dynamic robots.txt
Route::get('/sitemap.xml', [SeoController::class, 'sitemap']); // Dynamic sitemap.xml
