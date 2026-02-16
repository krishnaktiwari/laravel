<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Blog Listing
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $blogs = Blog::published()
            ->latest()
            ->paginate(10);

        return view('blog.index', compact('blogs'));
    }

    /*
    |--------------------------------------------------------------------------
    | Single Blog Post
    |--------------------------------------------------------------------------
    */
    public function post($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        return view('blog.show', compact('blog'));
    }

    /*
    |--------------------------------------------------------------------------
    | Store (Optional Admin Use)
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Blog::create($request->all());

        return redirect()->back()->with('success', 'Blog created successfully');
    }
}
