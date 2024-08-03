<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //

    public function login_from()
    {
        if (Auth::check()) {

            return view('backend.layouts.main');
        } else {
            return view('backend.author.login');
        }
    }

    // login Section
    public function login(Request $request)
    {

        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            "email" => 'required|email|exists:users',
            "password" => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            if (Auth::user()->status == 1) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('home_page');
            }
        }

        return redirect()->back();
    }
}
