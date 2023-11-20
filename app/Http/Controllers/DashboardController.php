<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    //
    public function index()
    {

        // Total Amount
        if (Auth::user()->user_type == 'admin') {
            $customers =  $customers = DB::table('customers')

                ->join('users', 'customers.user_id', '=', 'users.id')
                ->select('customers.*', 'users.name as user_name')
                ->get();

            $sumApprovedLoansAmount = DB::table('customers')
                ->where('loan_status', 'Approved')
                ->sum('loan_amount');

            // loan Application
            $totalLoanApplication = DB::table('customers')

                ->count();

            // Total Executive
            $totalExecutive = DB::table('users')
                ->where('user_type', 'user')
                ->count();
        } else {
            $customers = DB::table('customers')
                ->where('customers.user_id', Auth::user()->id)
                ->join('users', 'customers.user_id', '=', 'users.id')
                ->select('customers.*', 'users.name as user_name')
                ->get();

            $sumApprovedLoansAmount = DB::table('customers')
                ->where('loan_status', 'Approved')
                ->where('user_id', Auth::user()->id)
                ->sum('loan_amount');

            // tota LoanApplication
            $totalLoanApplication = DB::table('customers')
                ->where('user_id', Auth::user()->id)
                ->count();

            $totalExecutive = 0;
        }
        return view('dashboard', ['customers' => $customers, 'sumApprovedLoansAmount' => $sumApprovedLoansAmount, 'totalLoanApplication' => $totalLoanApplication, 'totalExecutive' => $totalExecutive]);
    }

    // Loan analytic data
    public function loanAnalyticData()
    {

        $monthlyCounts = DB::table('customers')
            ->select(
                DB::raw('MONTH(file_log_in_date) as month'),
                DB::raw('YEAR(file_log_in_date) as year'),
                DB::raw('SUM(loan_amount) as total_amount')
            )
            ->where('loan_status', '=', 'approved')
            ->groupBy(DB::raw('YEAR(file_log_in_date)'), DB::raw('MONTH(file_log_in_date)'))
            ->get();

        // Create an array with zero values for each month
        $result = [];
        for ($month = 1; $month <= 12; $month++) {
            $result[$month] = 0;
        }

        // Fill in the actual total amounts where they exist in the database results
        foreach ($monthlyCounts as $data) {
            $result[$data->month] = $data->total_amount;
        }

        // Extract the total_amount values for the response
        $response = array_values($result);

        return response($response);
    }

    // Loan application Data
    public function loanApplicationData(Request $request)
    {
        $results = DB::table('customers')
            ->select(
                DB::raw('COUNT(CASE WHEN loan_status = "approved" THEN 1 END) as approved_count'),
                DB::raw('COUNT(CASE WHEN loan_status = "rejected" THEN 1 END) as rejected_count'),
                DB::raw('COUNT(*) as total_count')
            )
            ->first();

        // Access the results
        $approvedCount = $results->approved_count;
        $rejectedCount = $results->rejected_count;
        $totalCount = $results->total_count;



        return [$approvedCount, $rejectedCount, $totalCount];
    }
}
