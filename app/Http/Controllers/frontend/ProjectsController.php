<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    //

    public function Projects_Section()
    {
        return view('frontend.projects.projects');
    }
}
