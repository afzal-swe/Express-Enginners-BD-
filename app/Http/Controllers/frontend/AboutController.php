<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //

    // About Section 
    public function About_Section()
    {
        return view('frontend.about.about');
    }
}
