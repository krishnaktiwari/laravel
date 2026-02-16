<?php 

use Illuminate\Support\Facades\Route;

use App\Modules\Blog\Controllers\HomeController;
use App\Modules\Blog\Controllers\BlogController;

Route::prefix("blog")->group(function () {

    Route::get("/", [HomeController::class, "index"])
        ->name("home.index");
    Route::get("/latest", [BlogController::class, "index"])
        ->name("blog.index");

});