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
    private $db_project_list;

    public function __construct()
    {
        $this->db_daly_expense_statement = "daly_expense_statement";
        $this->db_daly_income_statement = "daly_income_statement";
        $this->db_project_list = "project_list";
    }

    // Daly Statement Store
    public function Statement_Form()
    {
        $project_list = DB::table($this->db_project_list)->where('status', '1')->get();
        return view('backend.account.daly_statement.create_daly', compact('project_list'));
    }

    // All Statement View
    public function Statement_All()
    {
        // $income_statement = DB::table($this->db_daly_income_statement)->paginate(10);
        // $expense_statement = DB::table($this->db_daly_expense_statement)->paginate(10);

        return view('backend.account.daly_statement.statement');
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
            'income_date' => date('d-m-Y', strtotime($request->income_date)),
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
            'expense_date' => date('d-m-Y', strtotime($request->expense_date)),
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


    public function Single_Statement_Search(Request $request)
    {

        $income_statement = DB::table($this->db_daly_income_statement)
            ->where('income_date', date('d-m-Y', strtotime($request->search)))
            ->get();

        $expense_statement = DB::table($this->db_daly_expense_statement)
            ->where('expense_date', date('d-m-Y', strtotime($request->search)))
            ->get();

        return view('backend.account.daly_statement.statement', compact('expense_statement', 'income_statement'));
    }

    public function statements_searech(Request $request)
    {
        $start_date = date('d-m-Y', strtotime($request->start_date));
        $end_date = date('d-m-Y', strtotime($request->end_date));

        $income_statement = DB::table($this->db_daly_income_statement)
            ->whereBetween('income_date', [$start_date, $end_date])
            ->get();

        $expense_statement = DB::table($this->db_daly_expense_statement)
            ->whereBetween('expense_date', [$start_date, $end_date])
            ->get();

        return view('backend.account.daly_statement.statement', compact('expense_statement', 'income_statement'));
    }
}
