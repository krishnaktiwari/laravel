<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $seo = [
            'title' => config('app.name') . ' - ' . config('app.tagline'),
            'description' => config('app.description'),
        ];
        return view('pages.home.index', compact('seo'));

    }
    public function about_us()
    {
        $seo = [
            'title' => 'About Us - ' . config('app.name'),
            'description' => 'Learn more about ' . config('app.name') . ', our mission, vision, and the team behind our success.',
        ];
        return view('pages.home.about-us', compact('seo'));

    }
    public function contact_us()
    {
        $seo = [
            'title' => 'Contact Us - ' . config('app.name'),
            'description' => 'Get in touch with ' . config('app.name') . '. We would love to hear from you. Contact us for inquiries, support, or feedback.',
        ];
        return view('pages.home.contact-us', compact('seo'));

    }

    public function privacy_policy()
    {
        $seo = [
            'title' => 'Privacy Policy - ' . config('app.name'),
            'description' => 'Read our privacy policy to understand how we collect, use, and protect your information when you visit our website.',
        ];
        return view('pages.home.privacy-policy', compact('seo'));

    }
    public function terms_of_service()
    {
        $seo = [
            'title' => 'Terms of Service - ' . config('app.name'),
            'description' => 'Review our terms of service to understand the rules and guidelines for using our website and services.',
        ];
        return view('pages.home.terms-of-service', compact('seo'));

    }
}