<?php

namespace App\Modules\Jobs\Controllers;

use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    public function index()
    {
        return view("Jobs::pages.listing.index");
    }
}