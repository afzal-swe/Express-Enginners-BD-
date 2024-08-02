<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactSection extends Controller
{
    //

    // Contact Section Start
    public function Contact_Section()
    {
        return view('frontend.contact.contact');
    }
}
