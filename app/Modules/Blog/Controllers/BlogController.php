<?php

namespace App\Modules\Blog\Controllers;

use App\Modules\Blog\Models\Blog;
use App\Http\Controllers\Controller;

class BlogController extends Controller {

    public function index() {
        $seo = [
            'title' => 'Blog - ' . config('app.name'),
            'description' => 'Read the latest articles and updates from our blog. Stay informed about industry trends, tips, and insights.',
            'keywords' => 'blog, articles, updates, industry trends, tips, insights',
        ];
        return view("Blog::pages.blog.index", compact('seo'));
    }

    public function list() {
        $seo = [
            'title' => 'Blog List - ' . config('app.name'),
            'description' => 'Explore our comprehensive list of blog posts covering a wide range of topics. Stay informed and gain valuable insights.',
            'keywords' => 'blog list, articles, insights, industry trends, tips',
        ];
        return view("Blog::pages.blog.list", compact('seo'));
    }

    public function category($slug) {
        $seo = [
            'title' => 'Blog Category - ' . config('app.name'),
            'description' => 'Explore our blog posts categorized by topics. Stay informed and gain valuable insights on your favorite subjects.',
            'keywords' => 'blog category, articles, insights, industry trends, tips',
        ];
        return view("Blog::pages.blog.category", compact('seo'));
    }

    public function search() {
        $seo = [
            'title' => 'Blog Search - ' . config('app.name'),
            'description' => 'Search through our extensive collection of blog posts to find the information you need. Stay informed and gain valuable insights.',
            'keywords' => 'blog search, articles, insights, industry trends, tips',
        ];
        return view("Blog::pages.blog.search", compact('seo'));
    }

    public function show($slug) {
        $seo = [
            'title' => 'Blog Post - ' . config('app.name'),
            'description' => 'Read this insightful blog post on our latest topic. Stay informed and gain valuable knowledge.',
            'keywords' => 'blog post, insights, knowledge, industry trends',
        ];
        return view("Blog::pages.blog.show", compact('seo'));
    }

    public function sitemap() {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $blogs = Blog::select('slug', 'updated_at')->get();

        foreach ($blogs as $blog) {
            $xml .= sitemap_url_tag(
                    url('/' . $blog->slug),
                    $blog->updated_at,
                    'weekly',
                    '0.9'
            );
        }

        $xml .= '</urlset>';

        return response($xml, 200)
                        ->header('Content-Type', 'application/xml');
    }
}
