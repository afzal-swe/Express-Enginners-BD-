<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class WebsiteSettingsController extends Controller
{
    //
    private $db_website_setting;

    public function __construct()
    {
        $this->db_website_setting = "website_settings";
    }

    // Website Settings
    public function Website_Settings()
    {

        $website_setting = DB::table($this->db_website_setting)->first();

        if ($website_setting == Null) {

            return view('backend.settings.website_settings.create', compact('website_setting'));
        } else {

            return view('backend.settings.website_settings.update', compact('website_setting'));
        }
    }

    // Website Setting soter
    public function Website_Setting_Store(Request $request)
    {

        $validate = $request->validate([
            "website_name" => "required",
        ]);

        $data = array();
        $data['website_name'] = $request->website_name;
        $data['phone_one'] = $request->phone_one;
        $data['phone_two'] = $request->phone_two;
        $data['main_email'] = $request->main_email;
        $data['support_email'] = $request->support_email;
        $data['address'] = $request->address;
        $data['description'] = $request->description;


        $favicon = $request->favicon;
        $logo = $request->logo;

        if ($favicon) {

            $image_one = uniqid() . '.' . $favicon->getClientOriginalExtension();
            Image::make($favicon)->resize(16, 16)->save('backend/images/favicon/' . $image_one);
            $data['favicon'] = 'backend/images/favicon/' . $image_one;   // public/files/product/plus-point.jpg
        }
        if ($logo) {

            $image_one = uniqid() . '.' . $logo->getClientOriginalExtension();
            Image::make($logo)->resize(250, 150)->save('backend/images/logo/' . $image_one);
            $data['logo'] = 'backend/images/logo/' . $image_one;   // public/files/product/plus-point.jpg
        }

        DB::table($this->db_website_setting)->insert($data);

        $notification = array('messege' => 'Settings Create Successfully!', 'alert-type' => 'success');
        return redirect()->route('website.setting')->with($notification);
    }

    // Website Setting Update 
    public function Website_Setting_Update(Request $request, $id)
    {


        $data = array();
        $data['website_name'] = $request->website_name;
        $data['phone_one'] = $request->phone_one;
        $data['phone_two'] = $request->phone_two;
        $data['main_email'] = $request->main_email;
        $data['support_email'] = $request->support_email;
        $data['address'] = $request->address;
        $data['description'] = $request->description;


        $favicon = $request->favicon;
        // $oldfavicon = $request->oldfavicon;
        $logo = $request->logo;
        // $oldlogo = $request->oldlogo;

        if ($favicon) {

            $setting_favicon = DB::table($this->db_website_setting)->where('id', $id)->first();
            $old_favicon = $setting_favicon->favicon;
            unlink($old_favicon);

            $image_one = uniqid() . '.' . $favicon->getClientOriginalExtension();
            Image::make($favicon)->resize(16, 16)->save('backend/images/favicon/' . $image_one);
            $data['favicon'] = 'backend/images/favicon/' . $image_one;   // public/files/product/plus-point.jpg

        }
        if ($logo) {

            $setting_icon = DB::table($this->db_website_setting)->where('id', $id)->first();
            $old_logo = $setting_icon->logo;
            unlink($old_logo);

            $image_one = uniqid() . '.' . $logo->getClientOriginalExtension();
            Image::make($logo)->resize(800, 1000)->save('backend/images/logo/' . $image_one);
            $data['logo'] = 'backend/images/logo/' . $image_one;   // public/files/product/plus-point.jpg

        }

        DB::table($this->db_website_setting)->where('id', $id)->update($data);

        $notification = array('messege' => 'Settings Update Successfully!', 'alert-type' => 'success');
        return redirect()->route('website.setting')->with($notification);
    }
}
