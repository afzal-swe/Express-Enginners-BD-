<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class WorkBillController extends Controller
{
    //
    private $db_work_bill;
    private $db_project_list;

    public function __construct()
    {
        $this->db_work_bill = "work_bill";
        $this->db_project_list = "project_list";
    }

    // Work Bill Information Function
    public function Work_Bill_Create()
    {

        $project_list = DB::table($this->db_project_list)->where('status', '1')->get();
        return view('backend.account.work_bill.create_work_bill', compact('project_list'));
    }

    public function Work_Bill_Session_Store(Request $request)
    {

        $project_info = DB::table($this->db_project_list)->where('id', $request->project_id)->first();

        $request->session()->put('workBill', $request->all());
        $request->session()->put('project_info', $project_info);

        // dd(session()->all());

        $notification = array('messege' => 'Submit Ok !', 'alert-type' => 'success');
        return redirect()->route('work_bill.view')->with($notification);
    }





    public function Work_Bill_View()
    {
        return view('backend.account.work_bill.print');
    }

    // Work Bill Store Function
    public function Work_Bill_Store(Request $request)
    {
        // Validation
        $request->validate([
            "project_id" => "required",
        ]);

        // Prepare data

        $data = array();
        $data['project_id'] = $request->project_id;
        $data['ref'] = $request->ref;
        $data['equipment_list'] = $request->equipment_list;
        $data['quantity'] = $request->quantity;
        $data['unit_price'] = $request->unit_price;
        $data['total_price'] = $request->quantity * $request->unit_price;
        $data['date'] = date('d-m-Y');
        $data['month'] = date('F');
        $data['created_at'] = Carbon::now();

        if ($request->general_terms == "2") {
            $data['general_terms'] = $request->general_terms . $request->supply_date;
        } elseif ($request->general_terms == "3") {
            $data['general_terms'] = $request->general_terms . $request->expire_date;
        } else {
            $data['general_terms'] = $request->general_terms;
        }

        DB::table($this->db_work_bill)->insert($data);

        $notification = array('messege' => 'Work Bill Create Successfully !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // Project Working Bill Show
    public function Project_Bill_Show(Request $request, $id)
    {

        $p_work_bill = DB::table($this->db_work_bill)
            ->where('project_id', $id)
            ->join('project_list', 'work_bill.project_id', 'project_list.id')
            ->select('project_list.project_name', 'work_bill.*')
            ->get();
        // dd($p_work_bill);
        return view('backend.account.project_work_bill.view', compact('p_work_bill'));
    }
}
