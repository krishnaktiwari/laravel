<?php

namespace App\Modules\Blog\Controllers;

use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    public function index()
    {
        return view("Blog::pages.listing.index");
    }
}