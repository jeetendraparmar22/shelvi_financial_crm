<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        // Get all customers
        $customers = DB::table('customers')->get();
        return view('customer-list', ['customers' => $customers]);
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
        ]);

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
                'adhar_card' => $request->adhar_card,
                'finance_name' => $request->finance_name,
                'finance_address' => $request->finance_address,
                'Dealer_name' => $request->Dealer_name,
                'vehicle_type' => $request->vehicle_type,
                'vehicle_registration_no' => $request->vehicle_registration_no,
                'vehicle_registration_year' => $request->vehicle_registration_year,
                'chasis_no' => $request->chasis_no,
                'engine_no' => $request->engine_no,
                'fuel_type' => $request->fuel_type,
                'insurance_company_name' => $request->insurance_company_name,
                'rc_book' => $request->rc_book,
                'insurance_file' => $request->insurance_file,
                'loan_amount' => $request->loan_amount,
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
                'created_at' => now()

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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
