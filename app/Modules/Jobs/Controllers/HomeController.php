<?php

namespace App\Modules\Jobs\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $seo = [
            "title" => "Jobs -" . config("app.name"),
            "description" => "Find the latest government and private jobs across India. Search by location, category, and experience level. Apply online for verified job listings and grow your career with " . config("app.name") . ".",
            "keywords" => "latest jobs, government jobs, private jobs, apply online jobs, jobs in India, career opportunities, hiring now"
        ];

        return view('jobs::pages.home.index', compact('seo'));
    }
}
