<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    // Admin Dashboard
    public function Admin_dashboard()
    {
        if (Auth::check()) {

            return view('backend.layouts.main');
        } else {
            return redirect()->route('admin_login');
        }
    }

    // Logout Section
    public function Admin_logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }
}