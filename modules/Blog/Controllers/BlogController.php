<?php

namespace Modules\Blog\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Modules\Blog\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();

        $seo = [
            'title' => 'Blog',
            'description' => 'Welcome to our blog! Here you will find the latest news, insights, and updates on various topics. Stay tuned for informative articles, expert opinions, and engaging content that will keep you informed and entertained.',
        ];
        return view('blog::pages.index', compact('seo', 'blogs'));
    }
    public function list()
    {
        $blogs = Blog::all();
        $seo = [
            'title' => 'Blog List',
            'description' => 'Explore our comprehensive list of blog posts covering a wide range of topics. From technology and lifestyle to health and travel, our blog list offers something for everyone. Stay informed and inspired with our regularly updated content.',
        ];
        return view('blog::pages.list', compact('seo', 'blogs'));
    }
    public function category($category)
    {
        $seo = [
            'title' => 'Blog Category: ' . ucfirst($category),
            'description' => 'Discover our curated collection of blog posts in the ' . ucfirst($category) . ' category. Dive into insightful articles, expert opinions, and engaging content that will keep you informed and inspired on all things related to ' . $category . '.',
        ];
        return view('blog::pages.category', compact('seo', 'category'));
    }
    public function search(Request $request)
    {
        $seo = [
            'title' => 'Blog Search Results',
            'description' => 'Search results for: ' . $request->input('q'),
        ];
        return view('blog::pages.search', compact('seo', 'request'));
    }
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        if (!$blog) {
            abort(404);
        }

        $seo = [
            'title' => $blog->title,
            'description' => $blog->description,
        ];
        return view('blog::pages.show', compact('seo', 'blog'));
    }

    public function sitemap()
    {
        $blogs = Blog::all();
        return view('blog::sitemap', compact('blogs'));
    }
}