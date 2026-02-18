<?php

namespace App\Modules\Jobs\Controllers;
use App\Http\Controllers\Controller;


class JobsController extends Controller
{
    public function index()
    {
        return view("Jobs::pages.jobs.index");
    }    //
}