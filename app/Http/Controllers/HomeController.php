<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $seo = [
            'title' => config('app.name') . ' - ' . config('app.tagline'),
        ];
        return view('pages.home.index', compact('seo'));
    }
    public function about()
    {
        $seo = [
            'title' => 'About Us - ' . config('app.name'),
            'description' => 'Learn more about ' . config('app.name') . ' and our mission to provide quality tech content.',
        ];
        return view('pages.home.index', compact('seo'));
    }
    public function contact()
    {
        $seo = [
            'title' => 'Contact Us - ' . config('app.name'),
            'description' => 'Get in touch with the team at ' . config('app.name') . '. We would love to hear from you!',
        ];
        return view('pages.home.index', compact('seo'));
    }
    public function privacy_policy()
    {
        $seo = [
            'title' => 'Privacy Policy - ' . config('app.name'),
            'description' => 'Read the privacy policy of ' . config('app.name') . ' to understand how we handle your data.',
        ];
        return view('pages.home.index', compact('seo'));
    }
    public function terms_conditions()
    {
        $seo = [
            'title' => 'Terms of Service - ' . config('app.name'),
            'description' => 'Review the terms of service for using ' . config('app.name') . ' and our content.',
        ];
        return view('pages.home.index', compact('seo'));
    }
}
