<?php

namespace App\Modules\Business\Controllers;
use App\Http\Controllers\Controller;


class BusinessController extends Controller
{
    public function index()
    {
        return view("Business::pages.business.index");
    }    //
}