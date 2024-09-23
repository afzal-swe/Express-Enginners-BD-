<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SercicesController extends Controller
{
    //
    private $db_services;

    public function __construct()
    {
        $this->db_services = "services";
    }

    public function Manage_Services()
    {

        $view_services = DB::table($this->db_services)->orderBy('id', 'DESC')->get();
        return view('backend.services.view', compact('view_services'));
    }

    public function Create_Constructions()
    {
        return view('backend.services.create');
    }

    public function Services_Store(Request $request)
    {
        $validate = $request->validate([
            'services_name' => 'required',
            'icon' => 'required',
        ]);

        $data = array();
        $data['services_name'] = $request->services_name;
        $data['services_title'] = $request->services_title;
        $data['description'] = $request->description;
        $data['status'] = $request->status;
        $data['created_at'] = Carbon::now();

        $image = $request->icon;
        if ($image) {

            $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(99, 94)->save('backend/images/services/' . $image_name);
            $data['icon'] = 'backend/images/services/' . $image_name;
        }

        DB::table($this->db_services)->insert($data);

        $notification = array('messege' => 'Create Successfully !', 'alert-type' => 'success');
        return redirect()->route('manage.services')->with($notification);
    }


    public function Services_Edit($id)
    {
        $edit_services = DB::table($this->db_services)->where('id', $id)->first();
        return view('backend.services.update', compact('edit_services'));
    }



    public function Services_Update(Request $request, $id)
    {


        $data = array();
        $data['services_name'] = $request->services_name;
        $data['services_title'] = $request->services_title;
        $data['description'] = $request->description;
        $data['status'] = $request->status;
        $data['updated_at'] = Carbon::now();

        $image = $request->icon;
        if ($image) {

            $old_data = DB::table($this->db_services)->where('id', $id)->first();
            $old_icon = $old_data->icon;
            unlink($old_icon);

            $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(99, 94)->save('backend/images/services/' . $image_name);
            $data['icon'] = 'backend/images/services/' . $image_name;
        }

        DB::table($this->db_services)->where('id', $id)->update($data);

        $notification = array('messege' => 'Update Successfully !', 'alert-type' => 'success');
        return redirect()->route('manage.services')->with($notification);
    }

    public function Status_Services($id)
    {
        $check_status = DB::table($this->db_services)->where('id', $id)->first();

        $data = array();
        if ($check_status->status == "1") {
            $data['status'] = "0";
            DB::table($this->db_services)->where('id', $id)->update($data);

            $notification = array('messege' => 'Status Deactive Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $data['status'] = "1";

            DB::table($this->db_services)->where('id', $id)->update($data);

            $notification = array('messege' => 'Status Active Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }


    public function Services_Delete($id)
    {

        $old_data = DB::table($this->db_services)->where('id', $id)->first();

        $old_image = $old_data->icon;

        if ($old_image) {
            unlink($old_image);

            DB::table($this->db_services)->where('id', $id)->delete();
            $notification = array('messege' => 'Delete Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }

        DB::table($this->db_services)->where('id', $id)->delete();
        $notification = array('messege' => 'Delete Successfully !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
