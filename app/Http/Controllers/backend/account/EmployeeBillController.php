<?php

namespace App\Http\Controllers\Backend\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class EmployeeBillController extends Controller
{
    //
    private $db_employee_bill;
    private $db_employee;


    public function __construct()
    {
        $this->db_employee = "employee";
        $this->db_employee_bill = "employee_bill";
    }

    public function Employee_Bill()
    {
        return view('backend.account.employee.employee_bill');
    }

    public function Employee_Bill_Store(Request $request)
    {

        $validate = $request->validate([

            'date' => 'required',
            'e_id' => 'required',
            'reason' => 'required',
            'discription' => 'required',
            'deposit' => 'required',

        ]);

        // dd($request->all());

        $check_employee_id = DB::table($this->db_employee)->where('e_id_number', $request->e_id)->first();

        $data = array();

        if ($check_employee_id) {


            $data['date'] = date('d-m-Y', strtotime($request->date));
            $data['e_id'] = $request->e_id;
            $data['reason'] = $request->reason;
            $data['sallary_month'] = $request->sallary_month ?? '';
            $data['convenance_month'] = $request->convenance_month ?? '';
            $data['over_time_month'] = $request->over_time_month ?? '';
            $data['eid_bonus'] = $request->eid_bonus ?? '';
            $data['puscles_project'] = $request->puscles_project ?? '';
            $data['loan_purpose'] = $request->loan_purpose ?? '';
            $data['discription'] = $request->discription;
            $data['deposit'] = $request->deposit;
            $data['costs'] = "0";
            $data['created_at'] = Carbon::now();

            DB::table($this->db_employee_bill)->insert($data);

            $notification = array('messege' => 'Create Successfully !', 'alert-type' => 'success');
            return redirect()->route('employee.list')->with($notification);
        }

        $notification = array('messege' => 'Create Successfully !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function Employee_Bill_Edite($id)
    {


        $edit = DB::table($this->db_employee_bill)->where('id', $id)->first();
        return view('backend.account.employee.employee_bill_edit', compact('edit'));
    }

    public function Employee_Bill_Update(Request $request, $id)
    {

        $data['date'] = date('d-m-Y', strtotime($request->date));
        $data['reason'] = $request->reason;
        $data['sallary_month'] = $request->sallary_month;
        $data['convenance_month'] = $request->convenance_month;
        $data['over_time_month'] = $request->over_time_month;
        $data['eid_bonus'] = $request->eid_bonus;
        $data['puscles_project'] = $request->puscles_project;
        $data['loan_purpose'] = $request->loan_purpose;
        $data['discription'] = $request->discription;
        $data['deposit'] = $request->deposit;
        $data['updated_at'] = Carbon::now();

        DB::table($this->db_employee_bill)->where('id', $id)->update($data);

        $notification = array('messege' => 'Create Successfully !', 'alert-type' => 'success');
        return redirect()->route('employee.list')->with($notification);
    }

    // Employee Billing Details
    public function Employee_Bill_Details(Request $request, $e_id_number)
    {

        $single_employee_bill = DB::table($this->db_employee_bill)->where('e_id', $e_id_number)->orderBy('id', 'DESC')->get();
        // dd($single_employee_bill);
        return view('backend.account.employee.employee_bill_details', compact('single_employee_bill'));
    }


    public function Employee_Details_Delete($id)
    {

        DB::table($this->db_employee_bill)->where('id', $id)->delete();

        $notification = array('messege' => 'Delete Successfully !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
