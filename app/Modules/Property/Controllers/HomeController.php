<?php

namespace App\Modules\Property\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view("Property::pages.home.index");
    }
}