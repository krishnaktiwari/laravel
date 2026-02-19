<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        // Implement your search logic here, e.g., querying the database for matching products or content
        $results = []; // Replace with actual search results

        $seo = [
            'title' => 'Search Results for "' . $query . '" - ' . config('app.name'),
            'description' => 'Find the best results for your search query "' . $query . '" on Sarva. Explore our wide range of products and services that match your needs.',
            'keywords' => 'search, results, Sarva, ' . $query,
        ];

        return view('pages.search.index', compact('seo', 'results', 'query'));
    }
}