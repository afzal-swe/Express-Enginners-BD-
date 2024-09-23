<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SellingProductsController extends Controller
{
    //
    private $db_selling_products;

    public function __construct()
    {
        $this->db_selling_products = "selling_products";
    }

    public function Selling_Products_Manamge()
    {
        $view_sellin_products = DB::table($this->db_selling_products)->orderBy('id', 'DESC')->get();
        return view('backend.selling_products.view', compact('view_sellin_products'));
    }

    public function Selling_Products_Create()
    {
        return view('backend.selling_products.create');
    }

    public function Selling_Products_Store(Request $request)
    {
        $validate = $request->validate([
            'image' => 'required',
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['status'] = $request->status;
        $data['created_at'] = Carbon::now();

        $image = $request->image;

        if ($image) {

            $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1024, 768)->save('backend/images/selling_products/' . $image_name);
            $data['image'] = 'backend/images/selling_products/' . $image_name;
        }

        DB::table($this->db_selling_products)->insert($data);

        $notification = array('messege' => 'Create Successfully !', 'alert-type' => 'success');
        return redirect()->route('selling_products.manamge')->with($notification);
    }

    public function Selling_Products_Edit($id)
    {


        $edit = DB::table($this->db_selling_products)->where('id', $id)->first();
        return view('backend.selling_products.update', compact('edit'));
    }


    public function Selling_Products_Update(Request $request, $id)
    {
        $data = array();
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['status'] = $request->status;
        $data['updated_at'] = Carbon::now();

        $image = $request->image;

        if ($image) {

            $old_data = DB::table($this->db_selling_products)->where('id', $id)->first();
            $old_image = $old_data->image;
            unlink($old_image);

            $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1024, 768)->save('backend/images/selling_products/' . $image_name);
            $data['image'] = 'backend/images/selling_products/' . $image_name;
        }

        DB::table($this->db_selling_products)->where('id', $id)->update($data);

        $notification = array('messege' => 'Update Successfully !', 'alert-type' => 'success');
        return redirect()->route('selling_products.manamge')->with($notification);
    }


    public function Selling_Products_Status($id)
    {
        $check_status = DB::table($this->db_selling_products)->where('id', $id)->first();

        $data = array();
        if ($check_status->status == "1") {
            $data['status'] = "0";
            DB::table($this->db_selling_products)->where('id', $id)->update($data);

            $notification = array('messege' => 'Status Deactive Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $data['status'] = "1";

            DB::table($this->db_selling_products)->where('id', $id)->update($data);

            $notification = array('messege' => 'Status Active Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }



    public function Selling_Products_Delete($id)
    {
        $image = DB::table($this->db_selling_products)->where('id', $id)->first();


        if ($image) {
            $image_old = $image->image;
            unlink($image_old);

            DB::table($this->db_selling_products)->where('id', $id)->delete();

            $notification = array('messege' => 'Delete Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        DB::table($this->db_selling_products)->where('id', $id)->delete();

        $notification = array('messege' => 'Delete Successfully !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
