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
