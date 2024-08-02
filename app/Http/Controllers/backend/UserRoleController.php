<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class UserRoleController extends Controller
{
    //
    private $db_role;

    public function __construct()
    {
        $this->db_role = "user_role";
    }

    // View All User Role System
    public function Manage_Role()
    {

        $view_role = DB::table($this->db_role)->get();
        return view('backend.role.view_role', compact('view_role'));
    }

    // Create new Role Function
    public function Role_Create(Request $request)
    {

        $validate = $request->validate([
            "role_name" => "required|unique:user_role",

        ]);

        $data = array();
        $data['role_name'] = $request->role_name;
        $data['slug'] = Str::of($request->role_name)->slug('-');
        $data['status'] = $request->status;
        $data['created_at'] = Carbon::now();

        DB::table($this->db_role)->insert($data);

        $notification = array('messege' => 'Create Role Successfully !', 'alert-type' => 'error');
        return redirect()->route('manage.role')->with($notification);
    }

    // Edit Role Section
    public function Role_edit(Request $request)
    {
        $slug = $request->slug;

        $edit_role = DB::table($this->db_role)->where('slug', $slug)->first();
        return view('backend.role.update_role', compact('edit_role'));
    }

    // Update Role Function
    public function Role_Update(Request $request)
    {
        $slug = $request->slug;

        $data = array();
        $data['role_name'] = $request->role_name;
        $data['slug'] = Str::of($request->role_name)->slug('-');
        $data['status'] = $request->status;
        $data['updated_at'] = Carbon::now();

        DB::table($this->db_role)->where('slug', $slug)->update($data);

        $notification = array('messege' => 'Update Role Successfully !', 'alert-type' => 'error');
        return redirect()->route('manage.role')->with($notification);
    }


    // Delete Role Function
    public function Role_Delete(Request $request)
    {
        $slug = $request->slug;

        DB::table($this->db_role)->where('slug', $slug)->delete();

        $notification = array('messege' => 'Delete Role Successfully !', 'alert-type' => 'error');
        return redirect()->route('manage.role')->with($notification);
    }
}
