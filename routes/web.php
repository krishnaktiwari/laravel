<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;

use App\Http\Controllers\BlogController;
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
    Route::get('/portfolio', 'portfolio')->name('portfolio');
    Route::get('/careers', 'careers')->name('careers');

    // Legal
    Route::get('/privacy-policy', 'privacy_policy')->name('privacy-policy');
    Route::get('/terms-of-service', 'terms_of_service')->name('terms-of-service');
});


/*
|--------------------------------------------------------------------------
| Services Routes
|--------------------------------------------------------------------------
*/
Route::prefix('services')
    ->name('services.')
    ->controller(ServicesController::class)
    ->group(function () {

        Route::get('/', 'index')->name('index');

        // Web Designing & Development
        Route::get('/web-designing-development', 'web_designing_development')
            ->name('web-designing-development');
        Route::get('/web-designing-development/{slug}', 'web_designing_development')
            ->name('web-designing-development.show');

        // Mobile App Development
        Route::get('/mobile-app-development', 'mobile_app_development')
            ->name('mobile-app-development');
        Route::get('/mobile-app-development/{slug}', 'mobile_app_development')
            ->name('mobile-app-development.show');

        // Enterprise Software Solutions
        Route::get('/enterprise-software-solutions', 'enterprise_software_solutions')
            ->name('enterprise-software-solutions');
        Route::get('/enterprise-software-solutions/{slug}', 'enterprise_software_solutions')
            ->name('enterprise-software-solutions.show');

        // Digital Marketing
        Route::get('/digital-marketing', 'digital_marketing')
            ->name('digital-marketing');
        Route::get('/digital-marketing/{slug}', 'digital_marketing')
            ->name('digital-marketing.show');

        // Technology Consulting
        Route::get('/technology-consulting', 'technology_consulting')
            ->name('technology-consulting');
        Route::get('/technology-consulting/{slug}', 'technology_consulting')
            ->name('technology-consulting.show');
    });



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
Route::controller(SeoController::class)->group(function () {
    Route::get('/robots.txt', 'robots')->name('robots');
    Route::get('/sitemap.xml', 'sitemap')->name('sitemap');
});


/*
|--------------------------------------------------------------------------
| Assets Routes
|--------------------------------------------------------------------------
*/
Route::controller(AssetsController::class)->group(function () {
    Route::get('/assets/logo.svg', 'logo')->name('assets.logo');
});