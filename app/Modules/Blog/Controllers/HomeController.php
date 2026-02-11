<?php

namespace App\Modules\Blog\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view("blog::pages.home.index");
    }
}