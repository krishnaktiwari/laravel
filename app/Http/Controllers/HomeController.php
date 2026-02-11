<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $seo = [
            "title"       => config('app.name'),
            "description" => "This is the homepage of our Laravel application with full SEO optimization.",
            "keywords"    => "Laravel, SEO, Homepage, Web Development",
            "author"      => "Kshiti Technologies",
            "image"       => asset("images/seo-banner.png"),
            "url"         => url("/")
        ];

        return view("pages.index", compact("seo"));
    }
}
