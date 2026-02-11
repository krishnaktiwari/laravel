<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    public function index()
    {
        $seo = [
            "title" => config("app.name") . " - " . config("app.tagline"),
            "description" => config('app.description'),
            "keywords" => "home, page, website"
        ];

        return view("pages.home.index", compact('seo'));
    }
}
