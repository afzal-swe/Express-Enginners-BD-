<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    //

    // Services view function
    public function Services_Section()
    {
        return view('frontend.services.services');
    }
}
