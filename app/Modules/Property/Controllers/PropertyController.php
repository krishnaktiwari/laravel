<?php

namespace App\Modules\Property\Controllers;
use App\Http\Controllers\Controller;


class PropertyController extends Controller
{
    public function index()
    {
        return view("Property::pages.property.index");
    }    //
}