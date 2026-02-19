<?php


use Illuminate\Support\Facades\Route;

use Modules\Blog\Controllers\BlogController;

Route::prefix('blog')->group(function () {

    Route::get('/', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/list', [BlogController::class, 'list'])->name('blog.list');
    Route::get('/category/{category}', [BlogController::class, 'category'])->name('blog.category');
    Route::get('/search', [BlogController::class, 'search'])->name('blog.search');
    Route::get('/post/{id}', [BlogController::class, 'show'])->name('blog.show');

});