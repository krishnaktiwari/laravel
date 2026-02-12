<?php

namespace App\Modules\Blog\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Master\Models\MasterLocationModel;

class BlogController extends Controller
{
    public function index()
    {
        return view("blog::pages.blog.index");
    }
}