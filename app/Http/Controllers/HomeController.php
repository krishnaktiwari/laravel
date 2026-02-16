<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Common SEO Builder
     */
    private function seoData($title, $description, $type = "WebPage", $extraSchema = [])
    {
        return [
            "title" => $title,
            "description" => $description,

            "schema" => array_merge([
                "@context" => "https://schema.org",
                "@type" => $type,
                "name" => $title,
                "url" => url()->current(),
                "description" => $description,
            ], $extraSchema)
        ];
    }

    /**
     * Home Page
     */
    public function index()
    {
        $seo = $this->seoData(
            config("app.name") . " - " . config("app.tagline"),
            "Sarva One is an all-in-one platform offering smart solutions for real estate, jobs, businesses, events, and digital services.",
            "WebSite",
            [
                "publisher" => [
                    "@type" => "Organization",
                    "name" => config("app.name"),
                    "logo" => [
                        "@type" => "ImageObject",
                        "url" => asset("assets/logo.png"),
                    ]
                ]
            ]
        );

        return view("pages.home.index", compact("seo"));
    }

    /**
     * About Us Page
     */
    public function about_us()
    {
        $seo = $this->seoData(
            "About Us - " . config("app.name"),
            "Learn more about Sarva One, our vision to build a unified digital ecosystem for listings, services, and business growth across multiple industries.",
            "AboutPage"
        );

        return view("pages.home.about", compact("seo"));
    }

    /**
     * Contact Us Page
     */
    public function contact_us()
    {
        $seo = $this->seoData(
            "Contact Us - " . config("app.name"),
            "Get in touch with Sarva One for support, partnership inquiries, or to explore how our platform can help you grow digitally.",
            "ContactPage",
            [
                "contactPoint" => [
                    "@type" => "ContactPoint",
                    "contactType" => "Customer Support",
                    "email" => "support@sarvaone.com"
                ]
            ]
        );

        return view("pages.home.contact", compact("seo"));
    }

    /**
     * FAQ Page
     */
    public function faq()
    {
        $seo = $this->seoData(
            "FAQ - " . config("app.name"),
            "Browse frequently asked questions about Sarva One, our services, listings platform, and how users can benefit from our ecosystem.",
            "FAQPage"
        );

        return view("pages.home.faq", compact("seo"));
    }

    /**
     * Privacy Policy Page
     */
    public function privacy_policy()
    {
        $seo = $this->seoData(
            "Privacy Policy - " . config("app.name"),
            "Read Sarva One’s Privacy Policy to understand how we collect, use, and safeguard your personal data across our platform.",
            "WebPage"
        );

        return view("pages.home.privacy", compact("seo"));
    }

    /**
     * Terms & Conditions Page
     */
    public function terms_conditions()
    {
        $seo = $this->seoData(
            "Terms & Conditions - " . config("app.name"),
            "Review Sarva One’s Terms & Conditions to understand the rules, responsibilities, and guidelines for using our platform and services.",
            "WebPage"
        );

        return view("pages.home.terms", compact("seo"));
    }
}
