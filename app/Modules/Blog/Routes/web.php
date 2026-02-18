<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Blog\Controllers\BlogController;

Route::group([
    'prefix' => 'blog',
    'middleware' => ['web'],
], function () {

    Route::get('/', [BlogController::class, 'index'])
        ->name('blog.home');

    Route::get('/posts', [BlogController::class, 'posts'])
        ->name('blog.posts');

});