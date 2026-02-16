<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Blog\Controllers\HomeController;
Route::prefix('blog')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
});
