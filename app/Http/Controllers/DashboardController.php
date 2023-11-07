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
        if(Auth::user()->user_type == 'admin'){
        $customers = DB::table('customers')->get();
            
            $sumApprovedLoansAmount = DB::table('customers')
    ->where('loan_status', 'Approved')
    ->sum('loan_amount');

    // loan Application
    $totalLoanApplication = DB::table('customers')
    
    ->count();

            // Total Executive
            $totalExecutive = DB::table('users')
            ->where('user_type','user')
            ->count();

        }
        else{
        $customers = DB::table('customers')->where('user_id',Auth::user()->id)->get();

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
        return view('dashboard', ['customers' => $customers,'sumApprovedLoansAmount' => $sumApprovedLoansAmount,'totalLoanApplication' => $totalLoanApplication,'totalExecutive' => $totalExecutive]);
    }
}
