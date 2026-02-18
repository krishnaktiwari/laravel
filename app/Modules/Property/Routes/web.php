<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Property\Controllers\PropertyController;

Route::group([
    'prefix' => 'property',
    'middleware' => ['web'],
], function () {

    Route::get('/', [PropertyController::class, 'index'])
        ->name('property.home');

    Route::get('/posts', [PropertyController::class, 'posts'])
        ->name('property.posts');

});