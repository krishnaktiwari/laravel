<?php

use Illuminate\Support\Facades\Route;

use App\Modules\Kshititech\Controllers\HomeController;
use App\Modules\Kshititech\Controllers\SeoController;
use App\Modules\Kshititech\Controllers\ServicesController;
use App\Modules\Kshititech\Controllers\BlogController;

use App\Modules\Kshititech\Controllers\AssetsController;

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
|--------------------------------------------------------------------------
| Services Routes
|--------------------------------------------------------------------------
| Main services listing + individual service categories
|--------------------------------------------------------------------------
*/
Route::get('/services', [ServicesController::class, 'index']); // Services overview page

// Web Designing & Development
Route::get('/services/web-designing-development', [ServicesController::class, 'web_designing_development']);
Route::get('/services/web-designing-development/{slug}', [ServicesController::class, 'web_designing_development']);

// Mobile App Development
Route::get('/services/mobile-app-development', [ServicesController::class, 'mobile_app_development']);
Route::get('/services/mobile-app-development/{slug}', [ServicesController::class, 'mobile_app_development']);

// Enterprise Software Solutions
Route::get('/services/enterprise-software-solutions', [ServicesController::class, 'enterprise_software_solutions']);
Route::get('/services/enterprise-software-solutions/{slug}', [ServicesController::class, 'enterprise_software_solutions']);

// Digital Marketing
Route::get('/services/digital-marketing', [ServicesController::class, 'digital_marketing']);
Route::get('/services/digital-marketing/{slug}', [ServicesController::class, 'digital_marketing']);

// Technology Consulting
Route::get('/services/technology-consulting', [ServicesController::class, 'technology_consulting']);
Route::get('/services/technology-consulting/{slug}', [ServicesController::class, 'technology_consulting']);

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
