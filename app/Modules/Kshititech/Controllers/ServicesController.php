<?php

namespace App\Modules\Kshititech\Controllers;

use App\Http\Controllers\Controller;

class ServicesController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Services Index
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $seo = [
            'title' => 'Services - Kshiti Technologies',
            'description' => 'Explore our web development, mobile app development, enterprise software, digital marketing, and technology consulting services.',
            'og_type' => 'website',
            'image' => asset('assets/kshititech/images/services-og.png'),
        ];

        return view('kshititech::pages.services.index', compact('seo'));
    }

    /*
    |--------------------------------------------------------------------------
    | Web Designing & Development
    |--------------------------------------------------------------------------
    */
    public function web_designing_development(?string $slug = null)
    {
        return $this->servicePage(
            'Web Designing & Development',
            'kshititech::pages.services.web-designing-development',
            $slug
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Mobile App Development
    |--------------------------------------------------------------------------
    */
    public function mobile_app_development(?string $slug = null)
    {
        return $this->servicePage(
            'Mobile App Development',
            'kshititech::pages.services.mobile-app-development',
            $slug
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Enterprise Software Solutions
    |--------------------------------------------------------------------------
    */
    public function enterprise_software_solutions(?string $slug = null)
    {
        return $this->servicePage(
            'Enterprise Software Solutions',
            'kshititech::pages.services.enterprise-software-solutions',
            $slug
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Digital Marketing
    |--------------------------------------------------------------------------
    */
    public function digital_marketing(?string $slug = null)
    {
        return $this->servicePage(
            'Digital Marketing',
            'kshititech::pages.services.digital-marketing',
            $slug
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Technology Consulting
    |--------------------------------------------------------------------------
    */
    public function technology_consulting(?string $slug = null)
    {
        return $this->servicePage(
            'Technology Consulting',
            'kshititech::pages.services.technology-consulting',
            $slug
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Common Service Page Handler
    |--------------------------------------------------------------------------
    */
    private function servicePage(string $serviceTitle, string $view, ?string $slug)
    {
        $pageTitle = $slug
            ? ucfirst(str_replace('-', ' ', $slug))
            : $serviceTitle;

        $seo = [
            'title' => $pageTitle . ' - Kshiti Technologies',
            'description' => 'Learn more about ' . $pageTitle . ' service at Kshiti Technologies.',
            'og_type' => 'website',
            'image' => asset('assets/kshititech/images/services-og.png'),
        ];

        return view($view, compact('seo', 'slug'));
    }
}
