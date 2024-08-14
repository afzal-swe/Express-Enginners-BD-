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
}
