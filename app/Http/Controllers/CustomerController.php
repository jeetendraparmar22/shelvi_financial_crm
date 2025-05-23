<?php


namespace App\Http\Controllers;


use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class CustomerController extends Controller
{
    public function __construct()
    {
        DB::enableQueryLog(); // Enable query logging
    }

    // Delete application
    public function destroyLoanApplication(Request $request)
    {
        $application_id = $request->id;
        // Delete the application from the database
        DB::table('customers')->where('id', $application_id)->delete();
        return response()->json(['message' => 'Application deleted successfully'], 200);
    }

    // search application by finance
    public function searchApplicationByFinance(Request $request)
    {
        $finance_name = $request->finance;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $from_date = Carbon::createFromFormat('d/m/Y', $from_date)->format('Y-m-d');
        $to_date = Carbon::createFromFormat('d/m/Y', $to_date)->format('Y-m-d');

        $applications = DB::table('customers')
            ->whereBetween('file_log_in_date', [$from_date, $to_date])
            ->where('finance_name', $finance_name)
            ->get();
        $total_amount = DB::table('customers')
            ->whereBetween('file_log_in_date', [$from_date, $to_date])
            ->where('finance_name', $finance_name)
            ->sum('loan_amount');

        return response()->json(["message" => "success", "data" => $applications, "total_amount" => $total_amount]);
    }
    // update commission
    public function updateCommission(Request $request)
    {
        $application_id = $request->application_id;
        $commission = $request->commission;

        DB::table('customers')->where('id', $application_id)->update(['commission' => $commission]);
        return response()->json(['message' => 'Commission updated successfully'], 200);
    }

    // update payment status
    public function updatePaymentStatus(Request $request)
    {
        $application_id = $request->application_id;
        $payment_status = $request->status;

        try {
            DB::table('customers')->where('id', $application_id)->update(['commission_status' => $payment_status]);
            return response()->json(['success' => true, 'message' => 'Payment status updated successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::user()->user_type == 'admin') {
            // Get all customers
            $customers = Customer::orderBy('id', 'DESC')->get();
            $users = [];
            $finances = Customer::select('finance_name')->distinct()->get();
        } else {
            // Get all customers
            $customers = DB::table('customers')->orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->get();

            // get Users
            $users = DB::table('users')->orderBy('id', 'DESC')->where('user_type', 'user')->get();
            $finances = [];
        }


        return view('customer-list', ['customers' => $customers, 'users' => $users, 'finances' => $finances]);
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

        if ($request->loan_status == 'Approved') {
            $approved_date = Carbon::now()->format('Y-m-d');
        } else {
            $approved_date = null;
        }
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
                'city' => $request->city,
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
                'approved_date' =>  $approved_date,
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
        $cities = DB::table('cities')->get();
        $villages = DB::table('villages')->get();
        if (!$customer) {
            abort(404); // Handle the case where the order doesn't exist
        }

        return view('customer-details', ['customer' => $customer, 'cities' => $cities, 'villages' => $villages]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $customer_data = DB::table('customers')->where('id', $id)->first();

        // send state, city, village data
        $states = DB::table('states')->get();
        $cities = DB::table('cities')->get();
        $villages = DB::table('villages')->get();

        return view('customer-edit',  ['customer' => $customer_data, 'states' => $states, 'cities' => $cities, 'villages' => $villages]);
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
            $application_detail = DB::table('customers')->where('id', $id)->first();
            // Update approved date

            if ($request->loan_status == 'Approved' && $application_detail->approved_date == '') {
                $approved_date = Carbon::now()->format('Y-m-d');
            } else {
                $approved_date = $application_detail->approved_date;
            }
            $file_log_in_date = Carbon::createFromFormat('d/m/Y', $request->file_log_in_date)->format('Y-m-d');

            $update_data = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'last_name' => $request->last_name,
                'surname' => $request->surname,
                'email' => $request->email,
                'mobile_no' => $request->mobile_no,
                'address' => $request->address,
                // 'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
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
                'approved_date' => $approved_date,
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


    // Generate PDF
    public function generatePDF(Request $request)
    {
        $customer = DB::table('customers')->where('id', $request->id)->first();
        $cities = DB::table('cities')->get();
        $villages = DB::table('villages')->get();
        // Provide configuration options for the PDF class
        $data = [
            'title' => 'Shelvi financial services',
            'date' => date('m/d/Y'),
            'customer' => $customer,
            'cities' => $cities,
            'villages' => $villages
        ];

        $pdf = PDF::loadView('pdf.customer', $data);

        return $pdf->stream('customer_details.pdf');
    }


    // Update application transfer status
    public function updateTransferStatus(Request $request)
    {
        // update status
        $id = $request->id;
        DB::table('customers')->where('id', $id)
            ->update([
                'transfer_status' => '1'
            ]);
        return redirect()->route('customers.index');
    }


    // Payload
    public function payload()
    {
        // Dealer data
        $dealers = DB::table('customers')
            ->select('Dealer_name')
            ->distinct()
            ->get();

        $executives = DB::table('customers')
            ->select('executive_name')
            ->distinct()
            ->get();

        return view('payload', ['dealers' => $dealers, 'executives' => $executives]);
    }

    // Search payload
    public function payloadData(Request $request)
    {
        $dealer_name = $request->dealer;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $executive_name = $request->executive_name;

        $fromDate = Carbon::createFromFormat('d/m/Y', $from_date)->format('Y-m-d');
        $toDate = Carbon::createFromFormat('d/m/Y', $to_date)->format('Y-m-d');

        if ($executive_name == '') {
            $applications = DB::table('customers')
                ->where('Dealer_name', $dealer_name)
                ->whereBetween('file_log_in_date', [$fromDate, $toDate])
                ->get();
        } else {
            $applications = DB::table('customers')
                ->where('Dealer_name', $dealer_name)
                ->where('executive_name', $executive_name)
                ->whereBetween('file_log_in_date', [$fromDate, $toDate])
                ->get();
        }

        return response()->json(["message" => "success", "data" => $applications]);

        // return view('payload', ['applications' => $applications, 'dealers' => $dealers, 'dealer_name' => $dealer_name, 'from_date' => $from_date, 'to_date' => $to_date]);
    }

    // Generate payload pdf
    public function generatePayloadPDF(Request $request)
    {

        $dealer_name = $request->dealer_name;
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $executive_name = $request->executive_name;

        $fromDate = Carbon::createFromFormat('d/m/Y', $from_date)->format('Y-m-d');
        $toDate = Carbon::createFromFormat('d/m/Y', $to_date)->format('Y-m-d');

        if ($executive_name == '') {
            $applications = DB::table('customers')
                ->where('Dealer_name', $dealer_name)
                ->where('commission_status', 0)
                ->whereBetween('file_log_in_date', [$fromDate, $toDate])
                ->select('customers.*', DB::raw("(loan_amount * commission / 100) as commission_amount"))
                ->get();

            $grand_total = DB::table('customers')
                ->where('Dealer_name', $dealer_name)
                ->where('commission_status', 0)
                ->whereBetween('file_log_in_date', [$fromDate, $toDate])
                ->sum(DB::raw("(loan_amount * commission / 100)"));
        } else {
            $applications = DB::table('customers')
                ->where('Dealer_name', $dealer_name)
                ->where('executive_name', $executive_name)
                ->where('commission_status', 0)
                ->whereBetween('file_log_in_date', [$fromDate, $toDate])
                ->select('customers.*', DB::raw("(loan_amount * commission / 100) as commission_amount"))
                ->get();

            $grand_total = DB::table('customers')
                ->where('Dealer_name', $dealer_name)
                ->where('executive_name', $executive_name)
                ->where('commission_status', 0)
                ->whereBetween('file_log_in_date', [$fromDate, $toDate])
                ->sum(DB::raw("(loan_amount * commission / 100)"));
        }





        $data = [
            'title' => 'Shelvi financial services',
            'date' => date('m/d/Y'),
            'applications' => $applications,
            'dealer_name' => $dealer_name,
            'grand_total' => $grand_total,
            'from_date' => $from_date,
            'to_date' => $to_date
        ];
        $pdf = PDF::loadView('pdf.dealer_payment', $data);

        return $pdf->stream('payout.pdf');
    }
}
