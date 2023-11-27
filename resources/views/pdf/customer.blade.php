<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <title>Shelvi Financial Services</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    <style>
        #customer-details .card .card-body {
            padding: 10px 20px 10px 20px;
        }

        #customer-details .card {
            margin: 0 0 5px;
        }

        #customer-details .col_details .card .card-body .table tbody tr td {
            padding: 3px 5px;
            font-size: 13px;
        }

        #customer-details .card .card-body .my-3 {
            margin-top: 3px !important;
            margin-bottom: 3px !important;
        }

        .small_logo {
            width: 100px;
            height: 100px;
            object-fit: contain;
            margin: 0 auto;
            text-align: center;
            display: flex;
            max-width: 100%
        }

        .logo_flex {
            margin: 0 auto;
            text-align: center;
            width: 100%;
        }
    </style>

</head>

<body>
    <div class="">
        <div class="container-fluid">
            <div class="">
                <img src="{{ asset('assets/img/logo-small.svg') }}" alt="Company Logo" class="img-fluid logo small_logo">
            </div>


            <div class="row" id="customer-details">
                <div class="col-lg-8 col-xxl-9 col_details">

                    <div class="card border">
                        <div class="card-body Bgcolor3">

                            <h5>Customer Details</h5>
                            <hr class="my-3">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><b class="text-header"> Name</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Mobile No</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->mobile_no }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Address</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->address }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">City/District</b></td>
                                            <td>:</td>
                                            <td>
                                                @foreach ($cities as $city)
                                                    @if ($customer->city == $city->id)
                                                        {{ $city->city_name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Village</b></td>
                                            <td>:</td>
                                            <td>
                                                @foreach ($villages as $village)
                                                    @if ($customer->village == $village->id)
                                                        {{ $village->village_name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card border">
                        <div class="card-body Bgcolor1">

                            <h5>Loan Details</h5>
                            <hr class="my-3">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><b class="text-header">Loan Amount</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->loan_amount }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Interest Rate (%)</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->interest_rate }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Loan Terms(Months)</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->loan_term }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">EMI</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->emi }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Loan Status</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->loan_status }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Remark</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->remark_loan_detail }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card border">
                        <div class="card-body Bgcolor2">

                            <h5>Borrower Info</h5>
                            <hr class="my-3">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><b class="text-header">Finance Name</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->finance_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Finance Address</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->finance_address }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Executive Name</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->executive_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Dealer Name</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->Dealer_name }}</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card border">
                        <div class="card-body Bgcolor3">

                            <h5>Vehicle Details</h5>
                            <hr class="my-3">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><b class="text-header">Vehicle Type</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->vehicle_type }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Vehicle Registration Number</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->vehicle_registration_no }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Registration Year</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->vehicle_registration_year }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Chasis Number</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->chasis_no }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Engine Number</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->engine_no }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Fuel Type</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->fuel_type }}</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card border">
                        <div class="card-body Bgcolor4">

                            <h5>Customer Bank Details</h5>
                            <hr class="my-3">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><b class="text-header">Account Holder Name</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->bank_account_holder_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Account Number</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->account_no }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Bank Name</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->bank_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Branch Name</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->branch_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">IFSC Code</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->ifsc_code }}</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Transfer Loan Amount</b></td>
                                            <td>:</td>
                                            <td>{{ $customer->transfer_loan_amount }}-INR</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>
</body>

</html>
