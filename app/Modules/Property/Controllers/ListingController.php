<?php

namespace App\Modules\Property\Controllers;

use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    public function index()
    {
        return view("Property::pages.listing.index");
    }
}