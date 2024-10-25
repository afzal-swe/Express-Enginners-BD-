<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ConstructionsController extends Controller
{
    //


    private $db_constructions;


    public function __construct()
    {
        $this->db_constructions = "constructions";
    }




    public function Manage_Constructions()
    {

        $view_constructions = DB::table($this->db_constructions)->orderBy('id', 'DESC')->get();
        return view('backend.constructions.view', compact('view_constructions'));
    }


    public function Store_Constructions(Request $request)
    {

        $validate = $request->validate([
            'title' => 'required',
            'image' => 'required',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['status'] = $request->status;
        $data['created_at'] = Carbon::now();

        $image = $request->image;

        if ($image) {

            $img_name = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(800, 600)->save('backend/images/construction/' . $img_name);
            $data['image'] = 'backend/images/construction/' . $img_name;
        }


        DB::table($this->db_constructions)->insert($data);

        $notification = array('messege' => 'Create Successfully !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }



    public function Edit_Constructions($id)
    {


        $edit = DB::table($this->db_constructions)->where('id', $id)->first();
        return view('backend.constructions.update', compact('edit'));
    }

    public function Update_Constructions(Request $request, $id)
    {

        $data = array();
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['status'] = $request->status;
        $data['updated_at'] = Carbon::now();

        $image = $request->image;

        if ($image) {

            $old_data = DB::table($this->db_constructions)->where('id', $id)->first();
            $old_imgae = $old_data->image;
            unlink($old_imgae);


            $img_name = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(800, 600)->save('backend/images/construction/' . $img_name);
            $data['image'] = 'backend/images/construction/' . $img_name;
        }


        DB::table($this->db_constructions)->where('id', $id)->update($data);

        $notification = array('messege' => 'Update Successfully !', 'alert-type' => 'success');
        return redirect()->route('manage.constructions')->with($notification);
    }


    public function Status_Constructions($id)
    {
        $check_status = DB::table($this->db_constructions)->where('id', $id)->first();

        $data = array();
        if ($check_status->status == "1") {
            $data['status'] = "0";
            DB::table($this->db_constructions)->where('id', $id)->update($data);

            $notification = array('messege' => 'Status Deactive Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $data['status'] = "1";

            DB::table($this->db_constructions)->where('id', $id)->update($data);

            $notification = array('messege' => 'Status Active Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }


    public function Delete_Constructions($id)
    {
        $image = DB::table($this->db_constructions)->where('id', $id)->first();


        if ($image) {
            $image_old = $image->image;
            unlink($image_old);

            DB::table($this->db_constructions)->where('id', $id)->delete();

            $notification = array('messege' => 'Delete Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        DB::table($this->db_constructions)->where('id', $id)->delete();

        $notification = array('messege' => 'Delete Successfully !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
