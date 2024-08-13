<?php

namespace App\Http\Controllers\backend;

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

    public function Manage_Contact()
    {
        $contact = DB::table($this->db_contacts)->orderBy('id', 'DESC')->get();
        return view('backend.contact.contact_view', compact('contact'));
    }

    // Message Delete Function
    public function Message_Delete($id)
    {

        DB::table($this->db_contacts)->where('id', $id)->delete();

        $notification = array('messege' => 'Message Delete Successfully !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
