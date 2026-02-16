<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {

        $seo = [
            'title' => 'Services - ' . config('app.name'),
            'description' => 'Explore our web development, mobile app development, enterprise software, digital marketing, and technology consulting services.',
        ];
        return view('pages.services.index', compact('seo'));
    }
    public function web_designing_development(?string $slug = null)
    {
        $location = '';

        if ($slug) {
            $locationName = ucwords(str_replace('-', ' ', $slug));
            $location = " in {$locationName}";
        }

        $seo = [
            'title' => 'Web Designing & Development' . $location . ' - ' . config('app.name'),
            'description' => 'Professional web designing and development services to create stunning and responsive websites.',
        ];
        return view('pages.services.index', compact('seo'));
    }
    public function mobile_app_development(?string $slug = null)
    {
        $location = '';

        if ($slug) {
            $locationName = ucwords(str_replace('-', ' ', $slug));
            $location = " in {$locationName}";
        }

        $seo = [
            'title' => 'Mobile App Development' . $location . ' - ' . config('app.name'),
            'description' => 'Expert mobile app development services for iOS and Android platforms to bring your app ideas to life.',
        ];
        return view('pages.services.index', compact('seo'));
    }
    public function enterprise_software_solutions(?string $slug = null)
    {
        $location = '';

        if ($slug) {
            $locationName = ucwords(str_replace('-', ' ', $slug));
            $location = " in {$locationName}";
        }

        $seo = [
            'title' => 'Enterprise Software Solutions' . $location . ' - ' . config('app.name'),
            'description' => 'Custom enterprise software solutions to streamline your business processes and enhance productivity.',
        ];
        return view('pages.services.index', compact('seo'));
    }
    public function digital_marketing(?string $slug = null)
    {
        $location = '';

        if ($slug) {
            $locationName = ucwords(str_replace('-', ' ', $slug));
            $location = " in {$locationName}";
        }

        $seo = [
            'title' => 'Digital Marketing' . $location . ' - ' . config('app.name'),
            'description' => 'Comprehensive digital marketing services to boost your online presence and drive business growth.',
        ];
        return view('pages.services.index', compact('seo'));
    }
    public function technology_consulting(?string $slug = null)
    {
        $location = '';

        if ($slug) {
            $locationName = ucwords(str_replace('-', ' ', $slug));
            $location = " in {$locationName}";
        }

        $seo = [
            'title' => 'Technology Consulting' . $location . ' - ' . config('app.name'),
            'description' => 'Strategic technology consulting services to help you make informed decisions and achieve your business goals.',
        ];
        return view('pages.services.index', compact('seo'));
    }
}