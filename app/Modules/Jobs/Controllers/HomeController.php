<?php

namespace App\Modules\Jobs\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view("Jobs::pages.home.index");
    }
}