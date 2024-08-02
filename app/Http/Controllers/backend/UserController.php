<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    private $db_user;

    public function __construct()
    {
        $this->db_user = "users";
    }

    // User Create From Section
    public function User_Create()
    {
        return view('backend.user.create');
    }


    // User Store Section
    public function User_Store(Request $request)
    {
        dd($request->all());
    }
}
