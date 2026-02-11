<?php

namespace App\Modules\Kshititech\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view("kshititech::pages.home.index");
    }
}