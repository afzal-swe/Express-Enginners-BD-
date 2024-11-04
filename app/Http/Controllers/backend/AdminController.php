<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Admin Dashboard
    public function Admin_dashboard()
    {
        if (Auth::user()->parmission == 1) {

            return view('backend.layouts.main');
        } else {
            return redirect()->route('admin_login');
        }
    }

    // Logout Section
    public function Admin_logout()
    {
        Auth::logout();
        $notification = array('messege' => 'Logout Successfully', 'alert-type' => 'success');
        return redirect()->to('/');
    }
}
