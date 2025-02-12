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
            // $customers = Customer::orderBy('id', 'DESC')->where('loan_status', 'Approved')->where('transfer_status', '1')->get();

            $customers = Customer::where('loan_status', 'Approved')
                ->where('transfer_status', '1')
                ->orderByRaw("FIELD(pdd_approve, 'no', 'yes')")
                ->whereRaw('DATEDIFF(NOW(), approved_date) > 40')
                ->get();
            // dd($customers->toArray());
            // get Users
            $users = DB::table('users')->orderBy('id', 'DESC')->where('user_type', 'user')->get();

            // dd($customers);
        } else {
            // Get all customers
            $customers = DB::table('customers')->orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->get();



            // get Users
            $users = DB::table('users')->orderBy('id', 'DESC')->where('user_type', 'user')->get();
        }
        $cities = DB::table('cities')->get();

        return view('dealer-case', ['customers' => $customers, 'users' => $users, 'cities' => $cities]);
    }

    public function pddApprove(Request $request)
    {
        // Update status of pdd approve
        DB::table('customers')->where('id', $request->id)->update([
            'pdd_approve' => 'yes'
        ]);
        return redirect()->back();
    }

    // Upload pdd document
    public function uploadedPddDocument(Request $request)
    {
        $application_id = $request->application_id;
    }
}
