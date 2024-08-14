<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;


class DalyStatementController extends Controller
{
    //
    private $db_daly_expense_statement;
    private $db_daly_income_statement;

    public function __construct()
    {
        $this->db_daly_expense_statement = "daly_expense_statement";
        $this->db_daly_income_statement = "daly_income_statement";
    }

    // Daly Statement Store
    public function Statement_Form()
    {
        return view('backend.account.daly_statement.create_daly');
    }


    /// Income Statement Function and Section Start ////

    // Income Statement Store
    public function Income_Statement_Store(Request $request)
    {

        $last_record = DB::table($this->db_daly_income_statement)->orderBy('id', 'DESC')->first();

        // Validation
        $request->validate([
            "income_date" => "required|date",
            "income_particulars" => "required|string",
            "income_reason" => "required|string",
            "income_amount" => "required|numeric",
        ]);

        // Prepare data
        $data = [
            'income_date' => $request->income_date,
            'income_particulars' => $request->income_particulars,
            'income_reason' => $request->income_reason,
            'income_amount' => $request->income_amount,
            'created_at' => Carbon::now()
        ];

        // Calculate income total
        if ($last_record) {
            $data['income_total'] = $last_record->income_total + $request->income_amount;
        } else {
            $data['income_total'] = $request->income_amount;
        }

        // Insert data
        DB::table($this->db_daly_income_statement)->insert($data);

        $notification = array('messege' => 'Added Income Statement Successfully !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    /// Income Statement Function and Section End ////


    /// Expense Statement Function and Section Start ////
    public function Expense_Statement_Store(Request $request)
    {
        $last_record = DB::table($this->db_daly_expense_statement)->orderBy('id', 'DESC')->first();

        // Validation
        $request->validate([
            "expense_date" => "required|date",
            "expense_particulars" => "required|string",
            "expense_reason" => "required|string",
            "expense_amount" => "required|numeric",
        ]);

        // Prepare data
        $data = [
            'expense_date' => $request->expense_date,
            'expense_particulars' => $request->expense_particulars,
            'expense_reason' => $request->expense_reason,
            'expense_amount' => $request->expense_amount,
            'created_at' => Carbon::now()
        ];

        // Calculate income total
        if ($last_record) {
            $data['expense_total'] = $last_record->expense_total + $request->expense_amount;
        } else {
            $data['expense_total'] = $request->expense_amount;
        }

        // Insert data
        DB::table($this->db_daly_expense_statement)->insert($data);

        $notification = array('messege' => 'Added Expense Statement Successfully !', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
