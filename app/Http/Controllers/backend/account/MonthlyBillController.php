<?php

namespace App\Http\Controllers\backend\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

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

    public function Add_Session_Data_For_Monthly_Bill(Request $request)
    {

        $request->validate([
            'billing_id' => ['required', 'string', 'max:255', 'unique:monthly_bill'],

        ]);
        $project_amount = DB::table($this->db_project_list)->where('id', $request->project_id)->first();

        $request->session()->put('billData', $request->all());
        $request->session()->put('project_data', $project_amount);


        $notification = array('messege' => 'Submit Ok !', 'alert-type' => 'success');
        return redirect()->route('view.submit')->with($notification);
    }





    public function Monthly_Bill_View()
    {

        return view('backend.account.monthly_bill.print');
    }


    // Monthly Bill Store Function
    public function Monthly_Bill_Store()
    {

        $bill_info = session()->get('billData');
        $project_info = session()->get('project_data');
        // dd(session()->all());



        $data = array();
        $data['project_id'] = $bill_info['project_id'];
        $data['billing_id'] = $bill_info['billing_id'];
        $data['date'] = $bill_info['date'];
        $data['description'] = $bill_info['description'];
        $data['month_name'] = $bill_info['month_name'];
        $data['no_month'] = $bill_info['no_month'];
        $data['lift_quanitiy'] = $project_info->lift_quanitiy;
        $data['unit_price'] = $project_info->unit_price;
        $data['price'] = $project_info->monthly_bill;
        $data['credit'] = '0';
        $data['debit'] = $project_info->monthly_bill;
        $data['total_price'] = $project_info->monthly_bill;
        $data['created_at'] = Carbon::now();
        // dd($data);

        DB::table($this->db_monthly_bill)->insert($data);

        session()->forget('billData');
        session()->forget('project_data');

        $notification = array('messege' => 'Monthly Bill Create Successfully !', 'alert-type' => 'success');
        return redirect()->route('project.list')->with($notification);
    }


    public function Monthly_Bill_Delete($id)
    {

        DB::table($this->db_monthly_bill)->where('id', $id)->delete();

        $notification = array('messege' => 'Monthly Bill Delete Successfully !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }



    public function Monthly_Bill_Submit()
    {
        $project_list = DB::table($this->db_project_list)->get();
        return view('backend.account.submit_billing.submit_monthly_bill', compact('project_list'));
    }

    public function Submit_Monthly_Billing(Request $request)
    {

        $monthly_bill = DB::table($this->db_monthly_bill)->where('billing_id', $request->billing_id)->first();
        // dd($monthly_bill);

        if ($monthly_bill) {
            $data = array();
            $data['project_id'] = $monthly_bill->project_id;
            $data['billing_id'] = $request->billing_id;
            $data['date'] = $request->date;
            $data['description'] = $monthly_bill->description;
            $data['month_name'] = $monthly_bill->month_name;
            $data['no_month'] = $monthly_bill->no_month;
            $data['lift_quanitiy'] = $monthly_bill->lift_quanitiy;
            $data['unit_price'] = $monthly_bill->unit_price;

            $data['price'] = $monthly_bill->total_price;
            $data['credit'] = $request->amount;
            $data['debit'] = $monthly_bill->debit - $request->amount;
            $data['total_price'] = $monthly_bill->credit + $monthly_bill->debit;
            $data['created_at'] = Carbon::now();

            DB::table($this->db_monthly_bill)->insert($data);

            $notification = array('messege' => 'Monthly Bill Create Successfully !', 'alert-type' => 'success');
            return redirect()->route('project.list')->with($notification);
        } else {

            $notification = array('messege' => 'Monthly Bill Create Successfully !', 'alert-type' => 'success');
            return redirect()->route('monthly_bill_submit')->with($notification);
        }
    }
}
