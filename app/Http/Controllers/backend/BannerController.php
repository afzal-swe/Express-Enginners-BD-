<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    //
    private $db_banner;

    public function __construct()
    {
        $this->db_banner = "banner";
    }

    public function View_Banner()
    {

        $banner = DB::table($this->db_banner)->orderBy('id', 'DESC')->get();

        return view('backend.banner.view', compact('banner'));
    }

    // Banner Store
    public function Banner_Store(Request $request)
    {

        // dd($request->all());

        $data = array();
        $data['status'] = $request->status;
        $data['created_at'] = Carbon::now();


        $image = $request->banner;

        if ($image) {

            $name_gen = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1920, 1080)->save("backend/images/banner/" . $name_gen);

            $data['banner'] = "backend/images/banner/" . $name_gen;
        }

        DB::table($this->db_banner)->insert($data);

        $notification = array('messege' => 'Banner Add Successfully !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // Banner Status Function
    public function Banner_Status($id)
    {

        $check_status = DB::table($this->db_banner)->where('id', $id)->first();

        $data = array();
        if ($check_status->status == "1") {
            $data['status'] = "0";
            DB::table($this->db_banner)->where('id', $id)->update($data);

            $notification = array('messege' => 'Status Deactive Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $data['status'] = "1";

            DB::table($this->db_banner)->where('id', $id)->update($data);

            $notification = array('messege' => 'Status Active Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }



    // Banner Edit Function
    public function Banner_Edit($id)
    {

        $banner_edit = DB::table($this->db_banner)->where('id', $id)->first();
        return view('backend.banner.update', compact('banner_edit'));
    }
    // Banner Update Function

    public function Banner_Update(Request $request, $id)
    {


        $data = array();
        $data['status'] = $request->status;
        $data['updated_at'] = Carbon::now();


        $image = $request->banner;
        $oldimage = $request->oldbanner;

        if ($image) {

            $img = DB::table($this->db_banner)->where('id', $id)->first();
            $banner_image = $img->banner;
            unlink($banner_image);

            $name_gen = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1920, 1080)->save("backend/images/banner/" . $name_gen);

            $data['banner'] = "backend/images/banner/" . $name_gen;
        }

        DB::table($this->db_banner)->where('id', $id)->update($data);

        $notification = array('messege' => 'Banner Update Successfully !', 'alert-type' => 'success');
        return redirect()->route('manage.banner')->with($notification);
    }

    // Banner Delete Function
    public function Banner_Delete($id)
    {

        $image = DB::table($this->db_banner)->where('id', $id)->first();

        if ($image) {
            $img = $image->banner;
            unlink($img);

            DB::table($this->db_banner)->where('id', $id)->delete();

            $notification = array('messege' => 'Banner Delete Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }
}
