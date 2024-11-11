<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Admin Dashboard
    public function Admin_dashboard()
    {
        return view('backend.layouts.main');
    }

    // Logout Section
    public function Admin_logout()
    {
        Auth::logout();
        $notification = array('messege' => 'Logout Successfully', 'alert-type' => 'success');
        return redirect()->to('/');
    }
}
