<?php

namespace App\Modules\Kshititech\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SeoService;

class BlogController extends Controller
{
    protected SeoService $seoService;

    public function __construct(SeoService $seoService)
    {
        $this->seoService = $seoService;
    }
    public function index()
    {
        $seo = $this->seoService->generate([
            'title' => 'Blog - Kshiti Technologies',
            'description' => 'Read the latest articles, insights, and updates from Kshiti Technologies on IT trends, digital transformation, and technology solutions.',
            'og_type' => 'website',
            'image' => asset('assets/kshititech/images/blog-og.png'),
        ]);
        return view('kshititech::pages.blog.index', compact('seo'));
    }
    public function post($slug)
    {
        $seo = $this->seoService->generate([
            'title' => ucfirst(str_replace('-', ' ', $slug)) . ' - Kshiti Technologies',
            'description' => 'Learn more about our ' . ucfirst(str_replace('-', ' ', $slug)) . ' blog post at Kshiti Technologies.',
            'og_type' => 'website',
            'image' => asset('assets/kshititech/images/blog-og.png'),
        ]);
        // For demonstration, we'll just pass the slug to the view. In a real application, you'd fetch blog post details from a database.
        return view('kshititech::pages.blog.post', compact('slug', 'seo'));
    }
}