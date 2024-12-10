<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\DalyIncomeStatement;


class DalyStatementController extends Controller
{
    //
    private $db_daly_expense_statement;
    private $db_daly_income_statement;
    private $db_project_list;


    private $db_employee;
    private $db_employee_bill;


    public function __construct()
    {
        $this->db_daly_expense_statement = "daly_expense_statement";
        $this->db_daly_income_statement = "daly_income_statement";
        $this->db_project_list = "project_list";

        $this->db_employee = "employee";
        $this->db_employee_bill = "employee_bill";
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

        $validated = $request->validate([
            'income_date' => 'required|date',
            'income_particulars' => 'required|string|max:255',
            'income_reason' => 'required|string|max:255',
            'income_amount' => 'required|numeric',
            'project_status' => 'nullable|integer',
            'project_id' => 'nullable|integer',
            'billing' => 'nullable|integer',
            'billing_id' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'ref' => 'nullable|string|max:255',
        ]);

        // Combine all input data into a single array, excluding `_token`
        $incomeDetails = $request->except(['_token']);

        $date = date('d-m-Y', strtotime($request->income_date));

        $existingRecord = DB::table($this->db_daly_income_statement)->where('income_date', $date)->first();

        if ($existingRecord) {
            // Decode the existing income details to merge
            $existingDetails = json_decode($existingRecord->income_details, true) ?? [];

            // Ensure income_amount is numeric
            $incomeDetails['income_amount'] = (float) $incomeDetails['income_amount'];

            // Add the new income details to the existing details
            $existingDetails[] = $incomeDetails;

            // Calculate the total sum of income_amount in the existing details
            $totalAmount = array_sum(array_column($existingDetails, 'income_amount'));

            // Store total amount in the last entry of the existing details
            $existingDetails[count($existingDetails) - 1]['total_amount'] = $totalAmount; // Add total_amount to the last entry

            // Update the database with merged data
            DB::table($this->db_daly_income_statement)
                ->where('income_date', $date)
                ->update([
                    'income_details' => json_encode($existingDetails),
                    'updated_at' => Carbon::now(),
                ]);

            $notification = ['messege' => 'Added Income Statement Successfully!', 'alert-type' => 'success'];
            return redirect()->back()->with($notification);
        } else {
            // Create a new record
            $incomeDetails['total_amount'] = (float) $incomeDetails['income_amount']; // Set total_amount for the first entry
            DB::table($this->db_daly_income_statement)->insert([
                'income_date' => $date,
                'income_details' => json_encode([$incomeDetails]), // Wrap incomeDetails in an array
                'created_at' => Carbon::now(),
            ]);

            $notification = ['messege' => 'Added Income Statement Successfully!', 'alert-type' => 'success'];
            return redirect()->back()->with($notification);
        }

        // Redirect back with notification
        return redirect()->back()->with($notification);
    }


    /// Income Statement Function and Section End ////


    /// Expense Statement Function and Section Start ////
    public function Expense_Statement_Store(Request $request)
    {
        $validated = $request->validate([
            'expense_date' => 'required|date',
            'expense_particulars' => 'required|string|max:255',
            'expense_reason' => 'required|string|max:255',
            'expense_amount' => 'required|numeric',
            'employee_status' => 'nullable|integer',
            'employee_id' => 'nullable|integer',
            'reason' => 'nullable|string',
        ]);

        // Combine all input data into a single array, excluding `_token`
        $expenseDetails = $request->except(['_token']);
        // dd($expenseDetails);

        $date = date('d-m-Y', strtotime($request->expense_date));

        $existingRecord = DB::table($this->db_daly_expense_statement)->where('expense_date', $date)->first();

        if ($existingRecord) {
            // Decode the existing income details to merge
            $existingDetails = json_decode($existingRecord->expense_details, true) ?? [];

            // Ensure expense_amount is numeric
            $expenseDetails['expense_amount'] = (float) $expenseDetails['expense_amount'];

            // Add the new income details to the existing details
            $existingDetails[] = $expenseDetails;

            // Calculate the total sum of expense_amount in the existing details
            $totalAmount = array_sum(array_column($existingDetails, 'expense_amount'));

            // Store total amount in the last entry of the existing details
            $existingDetails[count($existingDetails) - 1]['total_amount'] = $totalAmount; // Add total_amount to the last entry



            $check_employee_id = DB::table($this->db_employee)->where('e_id_number', $expenseDetails['employee_id'])->first();

            $employee_bill = DB::table($this->db_employee_bill)->where('e_id', $expenseDetails['employee_id'])->orderBy('id', 'DESC')->first();
            // dd($employee_bill);


            if ($check_employee_id) {

                // Update the database with merged data
                DB::table($this->db_daly_expense_statement)
                    ->where('expense_date', $date)
                    ->update([
                        'expense_details' => json_encode($existingDetails),
                        'updated_at' => Carbon::now(),
                    ]);

                DB::table($this->db_employee_bill)->insert([
                    'date' => $date,
                    'e_id' => $expenseDetails['employee_id'],
                    'reason' => $expenseDetails['reason'],
                    'sallary_month' => $expenseDetails['sallary_month'],
                    'convenance_month' => $expenseDetails['convenance_month'],
                    'over_time_month' => $expenseDetails['over_time_month'],
                    'eid_bonus' => $expenseDetails['eid_bonus'],
                    'puscles_project' => $expenseDetails['puscles_project'],
                    'loan_purpose' => $expenseDetails['loan_purpose'],
                    'credit' => '0',
                    'debit' => $expenseDetails['expense_amount'],
                    'total' => $employee_bill->total - $expenseDetails['expense_amount'],

                    'created_at' => Carbon::now(),
                ]);
            } else {

                // Update the database with merged data
                DB::table($this->db_daly_expense_statement)
                    ->where('expense_date', $date)
                    ->update([
                        'expense_details' => json_encode($existingDetails),
                        'updated_at' => Carbon::now(),
                    ]);
            }

            $notification = ['messege' => 'Added Income Statement Successfully!', 'alert-type' => 'success'];
            return redirect()->back()->with($notification);
        } else {
            // Create a new record
            $expenseDetails['total_amount'] = (float) $expenseDetails['expense_amount']; // Set total_amount for the first entry
            DB::table($this->db_daly_expense_statement)->insert([
                'expense_date' => $date,
                'expense_details' => json_encode([$expenseDetails]), // Wrap expenseDetails in an array
                'created_at' => Carbon::now(),
            ]);

            $notification = ['messege' => 'Added Income Statement Successfully!', 'alert-type' => 'success'];
            return redirect()->back()->with($notification);
        }

        // Redirect back with notification
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
