<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $seo = [
            'title' => config('app.name') . ' - ' . config('app.tagline'),
            'description' => 'Welcome to Sarva, your one-stop solution for all your needs. Explore our wide range of products and services designed to make your life easier.',
            'keywords' => 'Sarva, home, products, services, solutions',
        ];
        return view("pages.home.index", compact('seo'));
    }
    public function about()
    {
        $seo = [
            'title' => 'About Us - ' . config('app.name'),
            'description' => 'Learn more about Sarva, our mission, vision, and the team behind our success. Discover how we are committed to providing exceptional products and services to our customers.',
            'keywords' => 'about us, Sarva, mission, vision, team',
        ];
        return view("pages.home.about", compact('seo'));
    }
    public function contact()
    {
        $seo = [
            'title' => 'Contact Us - ' . config('app.name'),
            'description' => 'Get in touch with Sarva for any inquiries, support, or feedback. We are here to assist you and provide the best possible service.',
            'keywords' => 'contact us, Sarva, inquiries, support, feedback',
        ];
        return view("pages.home.contact", compact('seo'));
    }
    public function privacy_policy()
    {
        $seo = [
            'title' => 'Privacy Policy - ' . config('app.name'),
            'description' => 'Read our privacy policy to understand how we collect, use, and protect your personal information. Your privacy is important to us.',
            'keywords' => 'privacy policy, Sarva, personal information, data protection',
        ];
        return view("pages.home.privacy", compact('seo'));
    }
    public function terms_of_service()
    {
        $seo = [
            'title' => 'Terms of Service - ' . config('app.name'),
            'description' => 'Review our terms of service to understand the rules and guidelines for using our products and services. We are committed to providing a safe and enjoyable experience for all our users.',
            'keywords' => 'terms of service, Sarva, rules, guidelines, user experience',
        ];
        return view("pages.home.terms", compact('seo'));
    }
}