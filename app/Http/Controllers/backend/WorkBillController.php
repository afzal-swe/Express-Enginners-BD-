<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
// use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\Facade\PDF;

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


        // Get the last inserted serial number
        $lastRecord = DB::table('work_bill')
            ->latest('id')
            ->first();

        // Extract the last serial number or set to 1 if no records
        $lastSerial = $lastRecord ? (int) str_replace('EEBD/WB/', '', $lastRecord->ref) : 0;

        // Increment the serial number
        $newSerial = str_pad($lastSerial + 1, 4, '0', STR_PAD_LEFT);
        return view('backend.account.work_bill.create_work_bill', compact('project_list', 'newSerial'));
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
        $data['billing_date'] = date('d-m-Y', strtotime($work_bill_info['billing_date']));
        $data['equipment_list'] = json_encode($work_bill_info['equipment_list']);
        $data['quantity'] = json_encode($work_bill_info['quantity']);
        $data['unit_price'] = json_encode($work_bill_info['unit_price']);
        $data['sub_price'] = json_encode($work_bill_info['sub_price']);
        $data['in_word'] = $work_bill_info['in_word'];
        $data['general_terms'] =  $work_bill_info['general_terms'];
        $data['supply_date'] = date('d-m-Y', strtotime($work_bill_info['supply_date']));
        $data['expire_date'] = date('d-m-Y', strtotime($work_bill_info['expire_date']));
        $data['price'] = $work_bill_info['total_price'];
        $data['credit'] = $work_bill_info['total_price'];
        $data['debit'] = '0';
        $data['total_price'] = $work_bill_info['total_price'];

        if ($work_bill_info['discount_status'] == 1) {
            $data['discount_status'] = $work_bill_info['discount_status'];
            $data['special_discount'] = $work_bill_info['special_discount'];
        }
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


        $work_bill = DB::table($this->db_work_bill)->where('ref', $request->ref)->orderBy('id', 'DESC')->first();

        if ($work_bill) {
            $data = array();
            $data['project_id'] = $work_bill->project_id;
            $data['ref'] = $request->ref;
            $data['billing_date'] = date('d-m-Y', strtotime($request->billing_date));
            $data['equipment_list'] = json_encode($work_bill->equipment_list);
            $data['quantity'] = json_encode($work_bill->quantity);
            $data['unit_price'] = json_encode($work_bill->unit_price);
            $data['sub_price'] = json_encode($work_bill->sub_price);
            $data['in_word'] = $request->in_word;
            $data['general_terms'] =  $work_bill->general_terms;
            $data['supply_date'] = $work_bill->supply_date;
            $data['expire_date'] = $work_bill->expire_date;

            $data['price'] = $work_bill->total_price;
            $data['credit'] = '0';
            $data['debit'] = $request->total_price;
            $data['total_price'] = $work_bill->total_price - $request->total_price;

            $data['discount_status'] = $work_bill->discount_status;
            $data['special_discount'] = $work_bill->special_discount;
            $data['created_at'] = Carbon::now();
            // dd($request->all());

            DB::table($this->db_work_bill)->insert($data);

            $notification = array('messege' => 'Work Bill Create Successfully !', 'alert-type' => 'success');
            return redirect()->route('project.list')->with($notification);
        } else {
            $notification = array('messege' => 'Work Bill Create Successfully !', 'alert-type' => 'success');
            return redirect()->route('work_bill_submit')->with($notification);
        }
    }


    // Single Worrk bill View
    public function Work_Bill_Details($id)
    {
        $Work_Bill_Details_view = DB::table($this->db_work_bill)
            ->where('id', $id)
            ->first();
        return response()->json($Work_Bill_Details_view);
    }

    // Work Bill Print

    public function Work_Bill_Print($id)
    {
        $print = DB::table($this->db_work_bill)->where('id', $id)->first();
        // dd($print);


        try {

            return view('backend.account.work_bill.data_print', compact('print'));
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
