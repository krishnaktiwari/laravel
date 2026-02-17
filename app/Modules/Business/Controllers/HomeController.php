<?php

namespace App\Modules\Business\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view("Business::pages.home.index");
    }
}