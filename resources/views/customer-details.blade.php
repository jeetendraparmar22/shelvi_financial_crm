@extends('layouts.master')
@section('main-container')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-lg-4 col-xxl-3">
                    <div class="card border">
                        <div class="card-header">
                            <div class="media align-items-center">
                                <img class="img-radius img-fluid wid-40"
                                    src="{{ asset('assets/img/profiles/avatar-02.jpg') }}" alt="User image">
                                <div class="media-body mx-3">
                                    <h5 class="mb-1">{{ $customer->first_name }} {{ $customer->surname }}</h5>

                                </div>
                            </div>
                        </div>
                        <div class="card-body px-2 pb-0">
                            <div class="list-group list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="media align-items-center">
                                        <i class="fa fa-envelope f-20"></i>
                                        <div class="media-body mx-3">
                                            <h6 class="m-0">Email</h6>
                                        </div>
                                        <small>{{ $customer->email }}</small>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="media align-items-center">
                                        <i class="fa fa-phone f-20"></i>
                                        <div class="media-body mx-3">
                                            <h6 class="m-0">Mobile No.</h6>
                                        </div>
                                        <small>{{ $customer->mobile_no }}</small>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="media align-items-center">
                                        <i class="fa fa-location f-20"></i>
                                        <div class="media-body mx-3">
                                            <h6 class="m-0">Location</h6>
                                        </div>
                                        <small>{{ $customer->address }}</small>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 col-xxl-9">
                    <div class="card border">

                        <div class="card-body">

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
                        <div class="card-body">

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
                        <div class="card-body">

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
                        <div class="card-body">

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
                                            <td>{{ $customer->transfer_loan_amount }}</td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">

                            <h5>Documents Details</h5>
                            <hr class="my-3">
                            <div class="table-responsive">
                                <div class="docs_flex">
                                    <div class="doc_img">
                                        <a href="#"><img src="{{ asset('storage/' . $customer->adhar_card) }}"
                                                data-fancybox /></a>
                                        <a href="#"><img src="{{ asset('storage/' . $customer->rc_book) }}"
                                                data-fancybox /></a>
                                        <a href="#"><img src="{{ asset('storage/' . $customer->insurance_file) }}"
                                                data-fancybox /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
