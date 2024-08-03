<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PageContoller extends Controller
{
    //
    private $db_pages;

    public function __construct()
    {
        $this->db_pages = "pages";
    }

    // View All Pages Function 
    public function Manage_Page()
    {

        $pages = DB::table($this->db_pages)->get();

        return view('backend.page.page_view', compact('pages'));
    }

    // Create Page Function
    public function Create_Page(Request $request)
    {
        $validate = $request->validate([
            "page_name" => "required|unique:pages",
            "banner" => "required",
        ]);

        $data = array();
        $data['page_name'] = $request->page_name;
        $data['page_title'] = $request->page_title;
        $data['description'] = $request->description;
        $data['status'] = $request->status;
        $data['status'] = $request->status;
        $data['created_at'] = Carbon::now();
        $data['slug'] = Str::of($request->page_name)->slug('-');

        $image = $request->banner;


        if ($image) {

            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1920, 1182)->save('backend/images/page/' . $image_one);
            $data['banner'] = 'backend/images/page/' . $image_one;   // public/files/product/plus-point.jpg
        }

        DB::table($this->db_pages)->insert($data);

        $notification = array('messege' => 'Page Create Successfully!', 'alert-type' => 'success');
        return redirect()->route('manage.page')->with($notification);
    }

    // Page Edit Section
    public function Page_Edit(Request $request, $slug)
    {
        $page_edit = DB::table($this->db_pages)->where('slug', $slug)->first();
        return view('backend.page.update', compact('page_edit'));
    }

    // Page Update Function
    public function Page_Update(Request $request, $slug)
    {


        // dd($request->all());
        $data = array();
        $data['page_name'] = $request->page_name;
        $data['page_title'] = $request->page_title;
        $data['description'] = $request->description;
        $data['status'] = $request->status;
        $data['updated_at'] = Carbon::now();
        $data['slug'] = Str::of($request->page_name)->slug('-');


        $image = $request->banner;
        $oldban = $request->oldbanner;


        if ($image) {

            $image_one = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1920, 1182)->save('backend/images/page/' . $image_one);
            $data['banner'] = 'backend/images/page/' . $image_one;   // public/files/product/plus-point.jpg

            DB::table($this->db_pages)->where('slug', $slug)->update($data);
            unlink($oldban);
        }

        $data['banner'] = $oldban;

        DB::table($this->db_pages)->where('slug', $slug)->update($data);

        $notification = array('messege' => 'Page Update Successfully!', 'alert-type' => 'success');
        return redirect()->route('manage.page')->with($notification);
    }

    // page delete functin
    public function Page_Delete(Request $request, $slug)
    {

        $slug = $request->slug;

        $banner = DB::table($this->db_pages)->where('slug', $slug)->first();

        if ($banner !== 'photo') {
            $img = $banner->banner;
            unlink($img);
            DB::table($this->db_pages)->where('slug', $slug)->delete();

            $notification = array('messege' => 'Delete Successfully!', 'alert-type' => 'success');
            return redirect()->route('manage.page')->with($notification);
        } else {
            DB::table($this->db_pages)->where('slug', $slug)->delete();

            $notification = array('messege' => 'Delete Successfully!', 'alert-type' => 'success');
            return redirect()->route('manage.page')->with($notification);
        }
    }
}
