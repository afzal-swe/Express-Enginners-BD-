<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class NoticeController extends Controller
{
    //
    private $db_notice;

    public function __construct()
    {
        $this->db_notice = "notices";
    }

    // Notice Section
    public function Notice()
    {
        $notice = DB::table($this->db_notice)->first();

        if ($notice == Null) {
            return view('backend.settings.notice.notice');
        } else {
            return view('backend.settings.notice.update_notice', compact('notice'));
        }
    }

    // Notice Create Section
    public function Notice_Create(Request $request)
    {
        $validate = $request->validate([
            "notice" => "required",

        ]);

        $data = array();
        $data['notice'] = $request->notice;
        $data['status'] = $request->status;
        $data['created_at'] = Carbon::now();

        DB::table($this->db_notice)->insert($data);

        $notification = array('messege' => 'Create Successfully !', 'alert-type' => 'success');
        return redirect()->route('notice')->with($notification);
    }

    // Notice Update Function
    public function Notice_Update(Request $request)
    {

        $id = $request->id;

        $data = array();
        $data['notice'] = $request->notice;
        $data['status'] = $request->status;
        $data['updated_at'] = Carbon::now();

        DB::table($this->db_notice)->where('id', $id)->update($data);

        $notification = array('messege' => 'Update Successfully !', 'alert-type' => 'success');
        return redirect()->route('notice')->with($notification);
    }
}
