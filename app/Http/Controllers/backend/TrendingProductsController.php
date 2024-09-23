<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TrendingProductsController extends Controller
{
    //
    private $db_trending_products;

    public function __construct()
    {
        $this->db_trending_products = "trending_products";
    }


    public function Manage_Trending_Products()
    {

        $view_trending_products = DB::table($this->db_trending_products)->get();
        return view('backend.trending_products.view', compact('view_trending_products'));
    }

    public function Trending_Product_Store(Request $request)
    {
        $validate = $request->validate([

            'image' => 'required',
        ]);

        $data = array();
        $data['status'] = $request->status;
        $data['created_at'] = Carbon::now();

        $image = $request->image;
        if ($image) {


            $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(800, 600)->save('backend/images/trending/' . $image_name);
            $data['image'] = 'backend/images/trending/' . $image_name;
        }

        DB::table($this->db_trending_products)->insert($data);

        $notification = array('messege' => 'Create Successfully !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    public function Trending_Product_Status($id)
    {
        $check_status = DB::table($this->db_trending_products)->where('id', $id)->first();

        $data = array();
        if ($check_status->status == "1") {
            $data['status'] = "0";
            DB::table($this->db_trending_products)->where('id', $id)->update($data);

            $notification = array('messege' => 'Status Deactive Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $data['status'] = "1";

            DB::table($this->db_trending_products)->where('id', $id)->update($data);

            $notification = array('messege' => 'Status Active Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }


    public function Trending_Product_Delete($id)
    {
        $image = DB::table($this->db_trending_products)->where('id', $id)->first();


        if ($image) {
            $image_old = $image->image;
            unlink($image_old);

            DB::table($this->db_trending_products)->where('id', $id)->delete();

            $notification = array('messege' => 'Delete Successfully !', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        DB::table($this->db_trending_products)->where('id', $id)->delete();

        $notification = array('messege' => 'Delete Successfully !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
