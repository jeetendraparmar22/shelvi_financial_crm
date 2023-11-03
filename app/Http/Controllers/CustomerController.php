<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customer-list');
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

        ]);

        // save data in table
        try {
            $inser_data = DB::table('customers')->inser([
                'first_name' => $request->first_name,
                'first_name' => $request->last_name,
                'first_name' => $request->surname,
                'first_name' => $request->email,
                'first_name' => $request->mobile_no,
                'first_name' => $request->address,
                'first_name' => $request->country,
                'first_name' => $request->state,
                'first_name' => $request->village,
                'first_name' => $request->pincode,
                'first_name' => $request->alternate_mobile_no,
                'first_name' => $request->adhar_card,
                'first_name' => $request->finance_name,
                'first_name' => $request->finance_address,
                'first_name' => $request->Dealer_name,
                'first_name' => $request->vehicle_type,
                'first_name' => $request->vehicle_registration_no,
                'first_name' => $request->vehicle_registration_year,
                'first_name' => $request->chasis_no,
                'first_name' => $request->engine_no,
                'first_name' => $request->fuel_type,
                'first_name' => $request->insurance_company_name,
                'first_name' => $request->rc_book,
                'first_name' => $request->insurance_file,
                'first_name' => $request->loan_amount,
                'first_name' => $request->loan_surakhya_vimo,
                'first_name' => $request->iho,
                'first_name' => $request->file_charge,
                'first_name' => $request->road_side_assite,
                'first_name' => $request->rto_charge,
                'first_name' => $request->first_name,
                'first_name' => $request->first_name,
                'first_name' => $request->first_name,
                'first_name' => $request->first_name,
                'first_name' => $request->first_name,
                'first_name' => $request->first_name,
                'first_name' => $request->first_name,

            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
