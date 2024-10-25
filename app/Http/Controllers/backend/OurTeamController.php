<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class OurTeamController extends Controller
{
    //
    private $db_our_team;

    public function __construct()
    {
        $this->db_our_team = "our_team";
    }

    public function Manage_Team()
    {
        $our_team = DB::table($this->db_our_team)->get();
        return view('backend.our_team.view', compact('our_team'));
    }


    public function Add_Member(Request $request)
    {
        $validate = $request->validate([
            "image" => "required",
        ]);

        $data = array();

        $data['name'] = $request->name;
        $data['designation'] = $request->designation;
        $data['description'] = $request->description;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['instagram'] = $request->instagram;
        $data['linkedin'] = $request->linkedin;
        $data['status'] = $request->status;
        $data['created_at'] = Carbon::now();

        $img = $request->image;


        if ($img) {

            $image_one = uniqid() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(600, 600)->save('backend/images/team/' . $image_one);
            $data['image'] = 'backend/images/team/' . $image_one;   // public/files/product/plus-point.jpg
        }

        DB::table($this->db_our_team)->insert($data);

        $notification = array('messege' => 'Create Successfully!', 'alert-type' => 'success');
        return redirect()->route('manage.team')->with($notification);
    }

    public function Manage_Status($id)
    {
        $check_status = DB::table($this->db_our_team)->where('id', $id)->first();

        $data = array();
        if ($check_status->status == "1") {
            $data['status'] = "0";
            DB::table($this->db_our_team)->where('id', $id)->update($data);

            $notification = array('messege' => 'Status Deactive Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $data['status'] = "1";

            DB::table($this->db_our_team)->where('id', $id)->update($data);

            $notification = array('messege' => 'Status Active Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }


    public function Member_Delete($id)
    {
        $image = DB::table($this->db_our_team)->where('id', $id)->first();


        if ($image) {
            $image_old = $image->image;
            unlink($image_old);

            DB::table($this->db_our_team)->where('id', $id)->delete();

            $notification = array('messege' => 'Delete Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        DB::table($this->db_our_team)->where('id', $id)->delete();

        $notification = array('messege' => 'Delete Successfully !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
