<?php

namespace App\Http\Controllers\backend\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class MonthlyBillController extends Controller
{
    //
    private $db_monthly_bill;
    private $db_project_list;

    public function __construct()
    {
        $this->db_monthly_bill = "monthly_bill";
        $this->db_project_list = "project_list";
    }

    //
    public function Monthly_Bill_Create()
    {
        $project_list = DB::table($this->db_project_list)->get();
        return view('backend.account.monthly_bill.create_bill', compact('project_list'));
    }

    // Monthly Bill Store Function
    public function Monthly_Bill_Store(Request $request)
    {

        $project_amount = DB::table($this->db_project_list)->where('id', $request->project_id)->first();
        // Validation
        $request->validate([
            "project_id" => "required",
        ]);

        // Prepare data

        $data = array();
        $data['project_id'] = $request->project_id;
        $data['billing_id'] = $request->billing_id;
        $data['date'] = $request->date;
        $data['description'] = $request->description;
        $data['month_name'] = $request->month_name;
        $data['no_month'] = $request->no_month;
        $data['lift_quanitiy'] = $request->lift_quanitiy;
        $data['total_price'] = $project_amount->monthly_bill;
        $data['created_at'] = Carbon::now();

        DB::table($this->db_monthly_bill)->insert($data);

        $notification = array('messege' => 'Monthly Bill Create Successfully !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
