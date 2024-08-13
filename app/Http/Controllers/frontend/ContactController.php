<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    //
    private $db_contacts;

    public function __construct()
    {

        $this->db_contacts = "contacts";
    }


    // Contact Section Start
    public function Contact_Section()
    {
        return view('frontend.contact.contact');
    }

    // Message Function
    public function Message_Store(Request $request)
    {

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        $data['created_at'] = Carbon::now();

        DB::table($this->db_contacts)->insert($data);

        $notification = array('messege' => 'Send Successfully !', 'alert-type' => 'success');
        return redirect()->route('Contact.section')->with($notification);
    }
}
