<?php

namespace App\Modules\Business\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $seo = [
            "title" => "Business - " . config("app.name"),
            "description" => "Explore verified residential and commercial properties for sale and rent. Find apartments, houses, plots, and offices with the best deals and trusted listings on " . config("app.name") . ".",
            "keywords" => "business listing, buy business, rent business, real estate, apartments for sale, houses for rent, commercial business"
        ];

        return view('business::pages.home.index', compact('seo'));
    }
}
