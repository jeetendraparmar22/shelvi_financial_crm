<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function __construct()
    {
        DB::enableQueryLog(); // Enable query logging
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::user()->user_type == 'admin') {
            // Get all customers
            $customers = Customer::orderBy('id', 'DESC')->get();
            // get Users
            $users = DB::table('users')->orderBy('id', 'DESC')->where('user_type', 'user')->get();
        } else {
            // Get all customers
            $customers = DB::table('customers')->orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->get();

            // get Users
            $users = DB::table('users')->orderBy('id', 'DESC')->where('user_type', 'user')->get();
        }


        return view('customer-list', ['customers' => $customers, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('customer-application-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation 
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile_no' => 'required',
            'address' => 'required',
            'surname' => 'required',

        ]);

        // Store user document
        if ($request->hasFile('adhar_card_file')) {
            // Create a folder name using user name and current datetime
            $folderName = $request->first_name . '_' . now()->format('Y-m-d_H-i-s');

            // Store the uploaded document in the user's folder
            $cust_doc_path = $request->file('adhar_card_file')->storeAs('customer_documents/' . $folderName, $request->file('adhar_card_file')->getClientOriginalName(), 'public');
        } else {
            $cust_doc_path = "";
        }

        // Store RC book

        if ($request->hasFile('rc_book')) {
            // Create a folder name using user name and current datetime
            $folderName = $request->first_name . '_' . now()->format('Y-m-d_H-i-s');

            // Store the uploaded document in the user's folder
            $vehicle_rc_path = $request->file('rc_book')->storeAs('vehicle_documents/' . $folderName, $request->file('rc_book')->getClientOriginalName(), 'public');
        } else {
            $vehicle_rc_path = "";
        }

        // Store Insurance copy
        if ($request->hasFile('insurance_file')) {
            // Create a folder name using user name and current datetime
            $folderName = $request->first_name . '_' . now()->format('Y-m-d_H-i-s');

            // Store the uploaded document in the user's folder
            $vehicle_insurance_path = $request->file('insurance_file')->storeAs('insurance_documents/' . $folderName, $request->file('insurance_file')->getClientOriginalName(), 'public');
        } else {
            $vehicle_insurance_path = "";
        }
        $file_log_in_date = Carbon::createFromFormat('d/m/Y', $request->file_log_in_date)->format('Y-m-d');
        // save data in table
        try {
            $inser_data = DB::table('customers')->insert([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'last_name' => $request->last_name,
                'surname' => $request->surname,
                'email' => $request->email,
                'mobile_no' => $request->mobile_no,
                'address' => $request->address,
                'country' => $request->country,
                'state' => $request->state,
                'village' => $request->village,
                'pincode' => $request->pincode,
                'alternate_mobile_no' => $request->alternate_mobile_no,
                'adhar_card' =>  $cust_doc_path,
                'remark_customer_detail' => $request->remark_customer_detail,
                'file_log_in_date' => $file_log_in_date,
                'finance_name' => $request->finance_name,
                'finance_address' => $request->finance_address,
                'executive_name' => $request->executive_name,

                'Dealer_name' => $request->Dealer_name,
                'vehicle_type' => $request->vehicle_type,
                'vehicle_registration_no' => $request->vehicle_registration_no,
                'vehicle_registration_year' => $request->vehicle_registration_year,
                'chasis_no' => $request->chasis_no,
                'engine_no' => $request->engine_no,
                'fuel_type' => $request->fuel_type,
                'insurance_company_name' => $request->insurance_company_name,
                'rc_book' => $vehicle_rc_path,
                'insurance_file' => $vehicle_insurance_path,
                'loan_amount' => $request->loan_amount,
                'interest_rate' => $request->interest_rate,
                'loan_term' => $request->loan_term,
                'emi' => $request->emi,
                'loan_status' => $request->loan_status,

                'loan_surakhya_vimo' => $request->loan_surakhya_vimo,
                'iho' => $request->iho,
                'file_charge' => $request->file_charge,
                'road_side_assite' => $request->road_side_assite,
                'rto_charge' => $request->rto_charge,
                'hold_for_insurance' => $request->hold_for_insurance,
                'final_total_amount' => $request->final_total_amount,
                'remark_loan_detail' => $request->remark_loan_detail,

                'bank_account_holder_name' => $request->bank_account_holder_name,
                'account_no' => $request->account_no,
                'bank_name' => $request->bank_name,
                'branch_name' => $request->branch_name,
                'ifsc_code' => $request->ifsc_code,
                'transfer_loan_amount' => $request->transfer_loan_amount,

                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now('Asia/Kolkata')

            ]);



            return redirect()->route('customers.create')->with('success', 'Customer Data Added Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = DB::table('customers')->where('id', $id)->first(); // Replace 'Order' with your order model

        if (!$customer) {
            abort(404); // Handle the case where the order doesn't exist
        }

        return view('customer-details', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $customer_data = DB::table('customers')->where('id', $id)->first();
        return view('customer-edit',  ['customer' => $customer_data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // Validation 
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile_no' => 'required',
            'address' => 'required',
        ]);
        // Store user document
        if ($request->hasFile('adhar_card_file')) {
            // Create a folder name using user name and current datetime
            $folderName = $request->first_name . '_' . now()->format('Y-m-d_H-i-s');

            // Store the uploaded document in the user's folder
            $cust_doc_path = $request->file('adhar_card_file')->storeAs('customer_documents/' . $folderName, $request->file('adhar_card_file')->getClientOriginalName(), 'public');
        } else {
            // get old path
            $doc_path = DB::table('customers')->select('adhar_card')->where('id', $id)->first();
            $cust_doc_path = $doc_path->adhar_card;
        }

        // Store RC book

        if ($request->hasFile('rc_book')) {
            // Create a folder name using user name and current datetime
            $folderName = $request->first_name . '_' . now()->format('Y-m-d_H-i-s');

            // Store the uploaded document in the user's folder
            $vehicle_rc_path = $request->file('rc_book')->storeAs('vehicle_documents/' . $folderName, $request->file('rc_book')->getClientOriginalName(), 'public');
        } else {
            $rc_path = DB::table('customers')->select('rc_book')->where('id', $id)->first();

            $vehicle_rc_path = $rc_path->rc_book;
        }

        // Store Insurance copy
        if ($request->hasFile('insurance_file')) {
            // Create a folder name using user name and current datetime
            $folderName = $request->first_name . '_' . now()->format('Y-m-d_H-i-s');

            // Store the uploaded document in the user's folder
            $vehicle_insurance_path = $request->file('insurance_file')->storeAs('insurance_documents/' . $folderName, $request->file('insurance_file')->getClientOriginalName(), 'public');
        } else {
            $insurance_path = DB::table('customers')->select('insurance_file')->where('id', $id)->first();

            $vehicle_insurance_path = $insurance_path->insurance_file;
        }

        // update Data
        try {

            $file_log_in_date = Carbon::createFromFormat('d/m/Y', $request->file_log_in_date)->format('Y-m-d');

            $update_data = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'last_name' => $request->last_name,
                'surname' => $request->surname,
                'email' => $request->email,
                'mobile_no' => $request->mobile_no,
                'address' => $request->address,
                'country' => $request->country,
                'state' => $request->state,
                'village' => $request->village,
                'pincode' => $request->pincode,
                'alternate_mobile_no' => $request->alternate_mobile_no,
                'adhar_card' =>  $cust_doc_path,
                'remark_customer_detail' => $request->remark_customer_detail,
                'file_log_in_date' => $file_log_in_date,

                'finance_name' => $request->finance_name,
                'finance_address' => $request->finance_address,
                'executive_name' => $request->executive_name,

                'Dealer_name' => $request->Dealer_name,
                'vehicle_type' => $request->vehicle_type,
                'vehicle_registration_no' => $request->vehicle_registration_no,
                'vehicle_registration_year' => $request->vehicle_registration_year,
                'chasis_no' => $request->chasis_no,
                'engine_no' => $request->engine_no,
                'fuel_type' => $request->fuel_type,
                'insurance_company_name' => $request->insurance_company_name,
                'rc_book' => $vehicle_rc_path,
                'insurance_file' => $vehicle_insurance_path,
                'loan_amount' => $request->loan_amount,
                'interest_rate' => $request->interest_rate,
                'loan_term' => $request->loan_term,
                'emi' => $request->emi,
                'loan_status' => $request->loan_status,
                'remark_loan_detail' => $request->remark_loan_detail,

                'loan_surakhya_vimo' => $request->loan_surakhya_vimo,
                'iho' => $request->iho,
                'file_charge' => $request->file_charge,
                'road_side_assite' => $request->road_side_assite,
                'rto_charge' => $request->rto_charge,
                'hold_for_insurance' => $request->hold_for_insurance,
                'final_total_amount' => $request->final_total_amount,
                'bank_account_holder_name' => $request->bank_account_holder_name,
                'account_no' => $request->account_no,
                'bank_name' => $request->bank_name,
                'branch_name' => $request->branch_name,
                'ifsc_code' => $request->ifsc_code,
                'transfer_loan_amount' => $request->transfer_loan_amount,
                'updated_at' =>  Carbon::now('Asia/Kolkata')

            ];

            // Update
            DB::table('customers')->where('id', $id)->update($update_data);
            return redirect()->route('customers.index')->with('success', 'Data updated successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $customer = DB::table('customers')->where('id', $id)->delete();

        // Redirect or return a response
        return redirect()->route('customers.index')
            ->with('success', 'Record deleted successfully.');
    }

    public function searchCustomer(Request $request)
    {
        $targetMonth = $request->month;
        $query = DB::table('customers');

        if (!is_null($targetMonth)) {
            $query->whereMonth('file_log_in_date', $targetMonth);
        }
        if (Auth::user()->user_type == 'admin') {

            $customers = $query->get();
        } else {
            $customers = $query->where('user_id', Auth::user()->id)->get();
        }

        return view('customer-list', ['customers' => $customers]);
    }
}
