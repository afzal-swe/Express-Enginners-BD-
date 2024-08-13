<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProjectListController extends Controller
{
    //
    private $db_project_list;

    public function __construct()
    {
        $this->db_project_list = "project_list";
    }

    // View All Project List
    public function Project_List()
    {
        $project_list = DB::table($this->db_project_list)->orderBy('id', 'DESC')->get();
        return view('backend.account.project.view_list', compact('project_list'));
    }

    // Project create Function 
    public function Project_Create(Request $request)
    {

        $validate = $request->validate([
            "project_name" => "required",
            "project_sl" => "required|unique:project_list|max:4",
        ]);

        $data = array();
        $data['project_name'] = $request->project_name;
        $data['project_sl'] = $request->project_sl;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['monthly_bill'] = $request->monthly_bill;
        $data['status'] = $request->status;
        $data['created_at'] = Carbon::now();

        DB::table($this->db_project_list)->insert($data);

        $notification = array('messege' => 'Project Added Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // Project Edit Function
    public function Project_Edit($id)
    {

        $project_edit = DB::table($this->db_project_list)->where('id', $id)->first();
        return view('backend.account.project.update', compact('project_edit'));
    }

    /// Update Project Function
    public function Project_Update(Request $request, $id)
    {


        $data = array();
        $data['project_name'] = $request->project_name;
        $data['project_sl'] = $request->project_sl;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['monthly_bill'] = $request->monthly_bill;
        $data['status'] = $request->status;
        $data['updated_at'] = Carbon::now();

        DB::table($this->db_project_list)->where('id', $id)->update($data);

        $notification = array('messege' => 'Project Update Successfully!', 'alert-type' => 'success');
        return redirect()->route('project.list')->with($notification);
    }

    // Change Projec Status Function
    public function Project_Status($id)
    {

        $check_status = DB::table($this->db_project_list)->where('id', $id)->first();

        $data = array();
        if ($check_status->status == "1") {
            $data['status'] = "0";
            DB::table($this->db_project_list)->where('id', $id)->update($data);

            $notification = array('messege' => 'Status Deactive Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $data['status'] = "1";

            DB::table($this->db_project_list)->where('id', $id)->update($data);

            $notification = array('messege' => 'Status Active Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }

    // Project Delete Function
    public function Project_Delete($id)
    {


        DB::table($this->db_project_list)->where('id', $id)->delete();

        $notification = array('messege' => 'Delete Successfully !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
