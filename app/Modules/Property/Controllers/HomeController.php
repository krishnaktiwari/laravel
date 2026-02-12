<?php

namespace App\Modules\Property\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller {

    public function index() {
        $seo = [
            "title" => "Property - " . config("app.name"),
            "description" => "Explore verified residential and commercial properties for sale and rent. Find apartments, houses, plots, and offices with the best deals and trusted listings on " . config("app.name") . ".",
            "keywords" => "property listing, buy property, rent property, real estate, apartments for sale, houses for rent, commercial property"
        ];

        return view('property::pages.home.index', compact('seo'));
    }
}
