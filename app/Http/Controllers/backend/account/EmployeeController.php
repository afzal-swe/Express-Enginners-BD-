<?php

namespace App\Http\Controllers\Backend\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class EmployeeController extends Controller
{
    //
    private $db_employee;

    public function __construct()
    {
        $this->db_employee = "employee";
    }

    public function Employee_List()
    {
        $employee = DB::table($this->db_employee)->orderBy('id', 'DESC')->get();

        return view('backend.account.employee.employee _manage', compact('employee'));
    }

    public function Employee_Store(Request $request)
    {

        $validate = $request->validate([
            "e_name" => "required",
            "e_id_number" => "required|unique:employee|max:4",
            "join_date" => "required",
            "salary" => "required",
        ]);

        $data = array();

        $data['e_name'] = $request->e_name;
        $data['e_id_number'] = $request->e_id_number;
        $data['designation'] = $request->designation;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['join_date'] = date('d-m-Y', strtotime($request->join_date));
        $data['salary'] = $request->salary;
        $data['status'] = $request->status;
        $data['created_at'] = Carbon::now();

        DB::table($this->db_employee)->insert($data);

        $notification = array('messege' => 'Create Successfully !', 'alert-type' => 'success');
        return redirect()->route('employee.list')->with($notification);
    }


    public function Employee_Status($id)
    {
        $check_status = DB::table($this->db_employee)->where('id', $id)->first();

        $data = array();
        if ($check_status->status == "1") {
            $data['status'] = "0";
            DB::table($this->db_employee)->where('id', $id)->update($data);

            $notification = array('messege' => 'Status Deactive Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $data['status'] = "1";

            DB::table($this->db_employee)->where('id', $id)->update($data);

            $notification = array('messege' => 'Status Active Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }


    public function Employee_Edit($id)
    {

        $employee_edit = DB::table($this->db_employee)->where('id', $id)->first();

        return view('backend.account.employee.employee_edit', compact('employee_edit'));
    }


    public function Employee_Update(Request $request, $id)
    {

        $data = array();

        $data['e_name'] = $request->e_name;
        $data['designation'] = $request->designation;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['join_date'] = date('d-m-Y', strtotime($request->join_date));
        $data['salary'] = $request->salary;
        $data['status'] = $request->status;
        $data['updated_at'] = Carbon::now();

        DB::table($this->db_employee)->where('id', $id)->update($data);

        $notification = array('messege' => 'Create Successfully !', 'alert-type' => 'success');
        return redirect()->route('employee.list')->with($notification);
    }



    public function Employee_Delete($id)
    {

        DB::table($this->db_employee)->where('id', $id)->delete();

        $notification = array('messege' => 'Delete Successfully !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
