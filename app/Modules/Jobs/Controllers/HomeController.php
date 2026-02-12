<?php

namespace App\Modules\Jobs\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SeoService;

class HomeController extends Controller
{


    public function index()
    {
        $seo = [
            "title" => config("app.name") . " - " . config("app.tagline"),
            "description" => config('app.description'),
            "keywords" => "home, page, website"
        ];

        return view('jobs::pages.home.index', compact('seo'));
    }
    public function about_us()
    {
        $seo = [
            'title' => 'About Us - Kshiti Technologies',
            'description' => 'Learn more about Kshiti Technologies, our mission, vision, and the team dedicated to providing innovative IT and digital solutions for businesses.',
            'og_type' => 'website',
            'image' => asset('assets/jobs/images/about-us-og.png'),
        ];

        return view('jobs::pages.home.about-us', compact('seo'));
    }
    public function contact_us()
    {

        $seo = [
            'title' => 'Contact Us - Kshiti Technologies',
            'description' => 'Get in touch with Kshiti Technologies for inquiries, support, or to learn more about our IT and digital solutions for your business.',
            'og_type' => 'website',
            'image' => asset('assets/jobs/images/contact-us-og.png'),
        ];
        return view('jobs::pages.home.contact-us', compact('seo'));
    }

    public function portfolio()
    {
        $seo = [
            'title' => 'Our Portfolio - Kshiti Technologies',
            'description' => 'Explore our portfolio of successful projects and case studies that showcase our expertise in delivering innovative IT and digital solutions for businesses.',
            'og_type' => 'website',
            'image' => asset('assets/jobs/images/portfolio-og.png'),
        ];
        return view('jobs::pages.home.portfolio', compact('seo'));
    }
    public function contactForm(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Here you would typically send an email or save the message to the database
        // For demonstration, we'll just return a success response

        return response()->json(['message' => 'Thank you for contacting us! We will get back to you soon.']);
    }
    public function subscribeNewsletter(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        // Here you would typically add the email to your newsletter list
        // For demonstration, we'll just return a success response

        return response()->json(['message' => 'Thank you for subscribing to our newsletter!']);
    }
    public function requestQuote(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service' => 'required|string|max:255',
            'message' => 'nullable|string',
        ]);

        // Here you would typically send an email or save the quote request to the database
        // For demonstration, we'll just return a success response

        return response()->json(['message' => 'Thank you for requesting a quote! We will get back to you soon.']);
    }
    public function faq()
    {
        $seo = [
            'title' => 'FAQ - Kshiti Technologies',
            'description' => 'Find answers to frequently asked questions about Kshiti Technologies, our services, and how we can help your business.',
            'og_type' => 'website',
            'image' => asset('assets/jobs/images/faq-og.png'),
        ];
        return view('jobs::pages.home.faq', compact('seo'));
    }
    public function testimonials()
    {
        $seo = [
            'title' => 'Testimonials - Kshiti Technologies',
            'description' => 'Read testimonials from our satisfied clients and learn how Kshiti Technologies has helped businesses achieve their goals with our IT and digital solutions.',
            'og_type' => 'website',
            'image' => asset('assets/jobs/images/testimonials-og.png'),
        ];
        return view('jobs::pages.home.testimonials', compact('seo'));
    }
    public function team()
    {
        $seo = [
            'title' => 'Our Team - Kshiti Technologies',
            'description' => 'Meet the talented and dedicated team behind Kshiti Technologies, committed to delivering innovative IT and digital solutions for our clients.',
            'og_type' => 'website',
            'image' => asset('assets/jobs/images/team-og.png'),
        ];
        return view('jobs::pages.home.team', compact('seo'));
    }
    public function careers()
    {
        $seo = [
            'title' => 'Careers - Kshiti Technologies',
            'description' => 'Join the Kshiti Technologies team! Explore exciting career opportunities in IT and digital services and be part of our innovative journey.',
            'og_type' => 'website',
            'image' => asset('assets/jobs/images/careers-og.png'),
        ];
        return view('jobs::pages.home.careers', compact('seo'));
    }
    public function privacy_policy()
    {
        $seo = [
            'title' => 'Privacy Policy - Kshiti Technologies',
            'description' => 'Read the privacy policy of Kshiti Technologies to understand how we collect, use, and protect your personal information.',
            'og_type' => 'website',
            'image' => asset('assets/jobs/images/privacy-policy-og.png'),
        ];
        return view('jobs::pages.home.privacy-policy', compact('seo'));
    }
    public function terms_conditions()
    {
        $seo = [
            'title' => 'Terms & Conditions - Kshiti Technologies',
            'description' => 'Review the terms and conditions of using Kshiti Technologies services to understand your rights and responsibilities.',
            'og_type' => 'website',
            'image' => asset('assets/jobs/images/terms-conditions-og.png'),
        ];
        return view('jobs::pages.home.terms-conditions', compact('seo'));
    }
}
