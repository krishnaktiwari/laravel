<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Home Page
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $seo = [
            'title' => config('app.name'),
            'description' => 'Welcome to ' . config('app.name')
        ];

        return view('pages.home.abc', compact('seo'));
    }

    /*
    |--------------------------------------------------------------------------
    | About Us Page
    |--------------------------------------------------------------------------
    */
    public function about_us()
    {
        $seo = [
            'title' => 'About Us - ' . config('app.name'),
            'description' => 'Learn more about our company and services.'
        ];

        return view('pages.home.about-us', compact('seo'));
    }

    /*
    |--------------------------------------------------------------------------
    | Contact Us Page
    |--------------------------------------------------------------------------
    */
    public function contact_us()
    {
        $seo = [
            'title' => 'Contact Us - ' . config('app.name'),
            'description' => 'Get in touch with us for any queries or support.'
        ];

        return view('pages.home.contact-us', compact('seo'));
    }

    /*
    |--------------------------------------------------------------------------
    | Privacy Policy Page
    |--------------------------------------------------------------------------
    */
    public function privacy_policy()
    {
        $seo = [
            'title' => 'Privacy Policy - ' . config('app.name'),
            'description' => 'Read our privacy practices and policies.'
        ];

        return view('pages.home.privacy-policy', compact('seo'));
    }

    /*
    |--------------------------------------------------------------------------
    | Terms & Conditions Page
    |--------------------------------------------------------------------------
    */
    public function terms_conditions()
    {
        $seo = [
            'title' => 'Terms & Conditions - ' . config('app.name'),
            'description' => 'Review our terms and conditions for using this website.'
        ];

        return view('pages.home.terms-conditions', compact('seo'));
    }

    /*
    |--------------------------------------------------------------------------
    | Contact Form Submission (POST)
    |--------------------------------------------------------------------------
    */
    public function contactForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'message' => 'required|string|max:2000',
        ]);

        // Example: Save in DB / Send Email here

        return redirect()
            ->route('contact')
            ->with('success', 'Thank you! Your message has been submitted successfully.');
    }
}