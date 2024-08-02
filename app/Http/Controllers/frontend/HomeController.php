<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //


    // View Frontend Home Paqge
    public function home_page()
    {

        return view('frontend.layouts.main');
    }
}
