<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    public function index()
    {
        $seo = [
            "title" => env("APP_NAME"),
            "description" => "This is the home page of our website.",
            "keywords" => "home, page, website"
        ];

        return view("pages.home.index", compact('seo'));
    }
}
