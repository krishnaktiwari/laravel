<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Jobs\Controllers\JobsController;

Route::group([
    'prefix' => 'jobs',
    'middleware' => ['web'],
], function () {

    Route::get('/', [JobsController::class, 'index'])
        ->name('jobs.home');

    Route::get('/posts', [JobsController::class, 'posts'])
        ->name('jobs.posts');

});