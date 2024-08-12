<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

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
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
        ]);



        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['parmission'] = $request->parmission;
        $data['status'] = $request->status;
        $data['slug'] = Str::of($request->name)->slug('-');
        $data['password'] = Hash::make($request->password);
        $data['created_at'] = Carbon::now();

        DB::table($this->db_user)->insert($data);

        $notification = array('messege' => 'User Add Successfully !', 'alert-type' => 'success');
        return redirect()->route('user.view')->with($notification);
    }

    // User View Function
    public function User_View()
    {

        $user_view = DB::table($this->db_user)->orderBy('id', 'DESC')->get();
        return view('backend.user.view', compact('user_view'));
    }

    // User Edit Function
    public function User_Edit(Request $request)
    {
        $slug = $request->slug;
        $edit = DB::table($this->db_user)->where('slug', $slug)->first();
        return view('backend.user.update', compact('edit'));
    }

    // User Update Function
    public function User_Update(Request $request)
    {

        $request->validate([
            'name' => ['string', 'max:255', 'unique:users'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
        ]);

        $slug = $request->slug;

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['parmission'] = $request->parmission;
        $data['status'] = $request->status;
        $data['slug'] = Str::of($request->name)->slug('-');
        $data['updated_at'] = Carbon::now();

        DB::table($this->db_user)->where('slug', $slug)->update($data);

        $notification = array('messege' => 'User Update Successfully !', 'alert-type' => 'success');
        return redirect()->route('user.view')->with($notification);
    }

    // User Delete Function
    public function User_Delete(Request $request)
    {
        $slug = $request->slug;

        DB::table($this->db_user)->where('slug', $slug)->delete();

        $notification = array('messege' => 'User Delete Successfully !', 'alert-type' => 'error');
        return redirect()->route('user.view')->with($notification);
    }
}
