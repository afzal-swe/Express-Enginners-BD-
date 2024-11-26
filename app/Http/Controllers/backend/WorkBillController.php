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

        $request->validate([
            'ref' => ['required', 'string', 'max:255', 'unique:work_bill'],

        ]);

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
    public function Session_Data_Store()
    {

        $work_bill_info = session()->get('workBill');
        $project_info = session()->get('project_info');
        // dd(session()->all());

        $data = array();
        $data['project_id'] = $work_bill_info['project_id'];
        $data['ref'] = $work_bill_info['ref'];
        $data['billing_date'] = $work_bill_info['billing_date'];
        $data['equipment_list'] = json_encode($work_bill_info['equipment_list']);
        $data['quantity'] = json_encode($work_bill_info['quantity']);
        $data['unit_price'] = json_encode($work_bill_info['unit_price']);
        $data['sub_price'] = json_encode($work_bill_info['sub_price']);
        $data['in_word'] = $work_bill_info['in_word'];
        $data['general_terms'] =  $work_bill_info['general_terms'];
        $data['supply_date'] = $work_bill_info['supply_date'];
        $data['expire_date'] = $work_bill_info['expire_date'];
        $data['price'] = $work_bill_info['total_price'];
        $data['credit'] = '0';
        $data['debit'] = $work_bill_info['total_price'];
        $data['total_price'] = '0';
        $data['created_at'] = Carbon::now();


        DB::table($this->db_work_bill)->insert($data);

        session()->forget('workBill');
        session()->forget('project_info');

        $notification = array('messege' => 'Work Bill Create Successfully !', 'alert-type' => 'success');
        return redirect()->route('project.list')->with($notification);
    }





    // Work Bill Submit Section //
    public function Work_Bill_Submit()
    {
        $project_list = DB::table($this->db_project_list)->where('status', '1')->get();
        return view('backend.account.submit_billing.submit_work_bill', compact('project_list'));
    }

    public function work_bill_delete($id)
    {


        DB::table($this->db_work_bill)->where('id', $id)->delete();

        $notification = array('messege' => 'Monthly Bill Delete Successfully !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function Submit_Work_Bill_Update(Request $request)
    {
        $request->validate([
            'ref' => ['required', 'string', 'max:255'],

        ]);

        // dd($request->all());
        $work_bill = DB::table($this->db_work_bill)->where('ref', $request->ref)->first();

        if ($work_bill) {
            $data = array();
            $data['project_id'] = $work_bill->project_id;
            $data['ref'] = $request->ref;
            $data['billing_date'] = $request->billing_date;
            $data['equipment_list'] = json_encode($work_bill->equipment_list);
            $data['quantity'] = json_encode($work_bill->quantity);
            $data['unit_price'] = json_encode($work_bill->unit_price);
            $data['sub_price'] = json_encode($work_bill->sub_price);
            $data['in_word'] = $request->in_word;
            $data['general_terms'] =  $work_bill->general_terms;
            $data['supply_date'] = $work_bill->supply_date;
            $data['expire_date'] = $work_bill->expire_date;

            $data['price'] = $work_bill->total_price;
            $data['credit'] = $request->total_price;
            $data['debit'] = $work_bill->debit - $request->total_price;
            $data['total_price'] = $request->total_price;
            $data['created_at'] = Carbon::now();

            DB::table($this->db_work_bill)->insert($data);

            $notification = array('messege' => 'Work Bill Create Successfully !', 'alert-type' => 'success');
            return redirect()->route('project.list')->with($notification);
        } else {
            $notification = array('messege' => 'Work Bill Create Successfully !', 'alert-type' => 'success');
            return redirect()->route('work_bill_submit')->with($notification);
        }
    }
}
