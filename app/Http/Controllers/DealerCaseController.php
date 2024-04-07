<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DealerCaseController extends Controller
{
    // Listing
    public function index()
    {
        if (Auth::user()->user_type == 'admin') {
            // Get all customers
            $customers = Customer::orderBy('id', 'DESC')->where('loan_status', 'Approved')->where('transfer_status', '1')->get();
            // get Users
            $users = DB::table('users')->orderBy('id', 'DESC')->where('user_type', 'user')->get();
        } else {
            // Get all customers
            $customers = DB::table('customers')->orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->get();

            // get Users
            $users = DB::table('users')->orderBy('id', 'DESC')->where('user_type', 'user')->get();
        }
        $cities = DB::table('cities')->get();

        return view('dealer-case', ['customers' => $customers, 'users' => $users, 'cities' => $cities]);
    }
}
