<?php

namespace App\Modules\Business\Controllers;

use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    public function index()
    {
        return view("Business::pages.listing.index");
    }
}