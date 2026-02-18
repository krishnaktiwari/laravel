<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Business\Controllers\BusinessController;

Route::group([
    'prefix' => 'business',
    'middleware' => ['web'],
], function () {

    Route::get('/', [BusinessController::class, 'index'])
        ->name('business.home');

    Route::get('/posts', [BusinessController::class, 'posts'])
        ->name('business.posts');

});