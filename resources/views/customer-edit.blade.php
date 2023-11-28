@extends('layouts.master')
@section('main-container')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="card">
                <div class="rounded  p-3">
                    <ol class="breadcrumb breadcrumb-dot text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted">Form</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Edit Application Form</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('customers.update', $customer->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="wizard">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Customer Info">
                                            <a class="nav-link active d-flex align-items-center justify-content-center"
                                                href="#step1" id="step1-tab" data-bs-toggle="tab" role="tab"
                                                aria-controls="step1" aria-selected="true">
                                                <i class="far fa-user-circle"></i> Customer Info
                                            </a>
                                        </li>
                                        <li class="nav-item " role="presentation" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Borrower Info">
                                            <a class="nav-link  d-flex align-items-center justify-content-center"
                                                href="#step2" id="step2-tab" data-bs-toggle="tab" role="tab"
                                                aria-controls="step2" aria-selected="false">
                                                <i class="far fa-dollar-sign"></i> Borrower Info
                                            </a>
                                        </li>
                                        <li class="nav-item " role="presentation" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Vehicle Details">
                                            <a class="nav-link  d-flex align-items-center justify-content-center"
                                                href="#step3" id="step3-tab" data-bs-toggle="tab" role="tab"
                                                aria-controls="step3" aria-selected="false">
                                                <i class="fa fa-car"></i> Vehicle Details
                                            </a>
                                        </li>
                                        <li class="nav-item " role="presentation" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Loan Details">
                                            <a class="nav-link  d-flex align-items-center justify-content-center"
                                                href="#step4" id="step4-tab" data-bs-toggle="tab" role="tab"
                                                aria-controls="step4" aria-selected="false">
                                                <i class="fa fa-file"></i> Loan Details
                                            </a>
                                        </li>

                                        <li class="nav-item " role="presentation" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Customer Bank Details">
                                            <a class="nav-link  d-flex align-items-center justify-content-center"
                                                href="#step5" id="step5-tab" data-bs-toggle="tab" role="tab"
                                                aria-controls="step5" aria-selected="false">
                                                <i class="fa fa-university"></i> Customer Bank Details
                                            </a>
                                        </li>



                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                            aria-labelledby="step1-tab">


                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-title">
                                                        <h5>Customer Info</h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>First Name<span class="text-danger">*</span></label>
                                                        <input type="text" name="first_name"
                                                            value="{{ $customer->first_name }}"
                                                            class="form-control @error('first_name') is-invalid
                                        
                                                        @enderror"
                                                            placeholder="Enter First Name" id="first_name">
                                                    </div>
                                                    @error('first_name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Middle Name<span class="text-danger">*</span></label>
                                                        <input type="text" placeholder="Enter Middle Name"
                                                            name="last_name" value="{{ $customer->last_name }}"
                                                            class="form-control @error('last_name') is-invalid
                                        
                                                            @enderror">
                                                    </div>
                                                    @error('last_name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Surname<span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Surname" name="surname"
                                                            value="{{ $customer->surname }}">
                                                    </div>
                                                    @error('surname')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Email Address" name="email"
                                                            value="{{ $customer->email }}">
                                                    </div>
                                                    @error('email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-sm-12">

                                                    <div class="form-group">
                                                        <label>Mobile No<span class="text-danger">*</span></label>
                                                        <input type="number" name="mobile_no"
                                                            value="{{ $customer->mobile_no }}"
                                                            class="form-control @error('mobile_no') is-invalid
                                        
                                                        @enderror"
                                                            placeholder="Enter Mobile No">
                                                    </div>
                                                    @error('mobile_no')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror


                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Alternate Mobile No</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Mobile Number" name="alternate_mobile_no "
                                                            value="{{ $customer->alternate_mobile_no }}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-title">
                                                        <h5>Address Information</h5>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Address<span class="text-danger">*</span></label>
                                                        <textarea type="text" name="address"
                                                            class="form-control @error('address') is-invalid
                                        
                                                        @enderror"
                                                            placeholder="Enter your Address">{{ $customer->address }}</textarea>
                                                    </div>
                                                    @error('address')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                {{-- <div class="col-lg-4 col-12">
                                                    <div class="form-group mb-3">
                                                        <label>Country</label>
                                                        <select class="select" name="country"
                                                            id="edit_application_country_name">
                                                            <option value="{{ $customer->id }}">
                                                                {{ $customer->country }}</option>

                                                        </select>
                                                    </div>
                                                </div> --}}

                                                <div class="col-lg-4 col-12">
                                                    <div class="flex_row">
                                                        <div class="form-group mb-3">
                                                            <label>State</label>

                                                            <select class="select" name="state"
                                                                id="edit_application_state_name">
                                                                <option value="">Select state</option>
                                                                @foreach ($states as $state)
                                                                    <option value="{{ $state->id }}"
                                                                        @if ($state->id == $customer->state) selected @endif>
                                                                        {{ $state->state_name }}</option>
                                                                @endforeach


                                                            </select>
                                                        </div>
                                                        <a class="btn btn-success form-plus-btn" href="#"
                                                            data-bs-toggle="modal" data-bs-target="#add_state">
                                                            <i class="fe fe-plus-circle"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-12">
                                                    <div class="flex_row">
                                                        <div class="form-group mb-3">
                                                            <label>City/District</label>
                                                            <select class="select" name="city"
                                                                id="edit_application_city_name">
                                                                <option value="">Select City/District</option>
                                                                @foreach ($cities as $city)
                                                                    <option value="{{ $city->id }}"
                                                                        @if ($city->id == $customer->city) selected @endif>
                                                                        {{ $city->city_name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <a class="btn btn-secondary form-plus-btn" href="#"
                                                            data-bs-toggle="modal" data-bs-target="#add_city">
                                                            <i class="fe fe-plus-circle"></i>
                                                        </a>
                                                    </div>

                                                </div>

                                                <div class="col-lg-4 col-12">
                                                    <div class="flex_row">
                                                        <div class="form-group mb-3">
                                                            <label>Village</label>
                                                            <select class="select" name="village"
                                                                id="edit_application_village_name">
                                                                <option value="">Select Village</option>
                                                                @foreach ($villages as $village)
                                                                    <option value="{{ $village->id }}"
                                                                        @if ($village->id == $customer->village) selected @endif>
                                                                        {{ $village->village_name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <a class="btn btn-primary form-plus-btn" href="#"
                                                            data-bs-toggle="modal" data-bs-target="#add_village">
                                                            <i class="fe fe-plus-circle"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Pincode</label>
                                                        <input type="number" class="form-control"
                                                            placeholder="Enter Pincode" name="pincode">
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label>Aadhar Card</label>
                                                        <div class="form-group service-upload logo-upload mb-0">
                                                            <span><img src="{{ asset('assets/img/icons/img-drop.svg') }}"
                                                                    alt="upload"></span>
                                                            <div class="drag-drop">
                                                                <h6 class="drop-browse align-center">
                                                                    <span class="text-info me-1">Click to Replace
                                                                    </span>
                                                                    or Drag and Drop
                                                                </h6>
                                                                <p class="text-muted">SVG, PNG, JPG (Max 800*400px)</p>
                                                                <input type="file" multiple id="image_sign"
                                                                    name="adhar_card_file">
                                                                <div id="frames"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-12">
                                                    <div class="form-group">
                                                        <label>Application Date</label>
                                                        <div class="cal-icon cal-icon-info">
                                                            <input type="text" class="datetimepicker1 form-control"
                                                                name="file_log_in_date" placeholder="Select Date"
                                                                value="{{ $customer->file_log_in_date ? \Carbon\Carbon::createFromFormat('Y-m-d', $customer->file_log_in_date)->format('d/m/Y') : '' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                        <label>Remark</label>
                                                        <textarea type="text" name="remark_customer_detail" class="form-control" placeholder="Enter Remark">{{ $customer->remark_customer_detail }}</textarea>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="d-flex">
                                                <a class="btn btn btn-primary next" id="customer-detail-next">Next</a>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" role="tabpanel" id="step2"
                                            aria-labelledby="step2-tab">
                                            <div class="mb-4">
                                                <h5>Borrower Info</h5>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-pancard-input" class="form-label">Finance
                                                            Name</label>
                                                        <input type="text" class="form-control"
                                                            id="basicpill-pancard-input" placeholder="Enter Finance Name"
                                                            name="finance_name" value="{{ $customer->finance_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-vatno-input" class="form-label">Finance
                                                            Address</label>
                                                        <textarea class="form-control" placeholder="Enter Finance Address" name="finance_address">{{ $customer->finance_address }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Executive Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Executive Name" name="executive_name"
                                                            value="{{ $customer->executive_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Dealer Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Dealer Name" name="Dealer_name"
                                                            value="{{ $customer->Dealer_name }}">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="d-flex">
                                                <a class="btn btn btn-primary previous me-2"> Back</a>
                                                <a class="btn btn btn-primary next">Continue</a>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" role="tabpanel" id="step3"
                                            aria-labelledby="step3-tab">
                                            <div class="mb-4">
                                                <h5>Vehicle Details</h5>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Vehicle Type</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Vehicle Type" name="vehicle_type"
                                                            value="{{ $customer->vehicle_type }}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Vehicle Registration Number</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Vehicle Registration Number"
                                                            name="vehicle_registration_no"
                                                            value="{{ $customer->vehicle_registration_no }}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Registration Year</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Registration Year"
                                                            name="vehicle_registration_year"
                                                            value="{{ $customer->vehicle_registration_year }}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Chasis Number </label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Chasis Number" name="chasis_no"
                                                            value="{{ $customer->chasis_no }}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Engine Number </label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Engine Number" name="engine_no"
                                                            value="{{ $customer->engine_no }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Fuel Type</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Fuel Type" name="fuel_type"
                                                            value="{{ $customer->fuel_type }}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Insurance Company Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Insurance Company Name"
                                                            name="insurance_company_name"
                                                            value="{{ $customer->insurance_company_name }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="mb-4">
                                                    <h5>Upload Required Documents</h5>
                                                </div>
                                                {{-- <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label>Aadhar Card</label>
                                                        <div class="form-group service-upload logo-upload mb-0">
                                                            <span><img src="assets/img/icons/img-drop.svg"
                                                                    alt="upload"></span>
                                                            <div class="drag-drop">
                                                                <h6 class="drop-browse align-center">
                                                                    <span class="text-info me-1">Click to Replace </span>
                                                                    or Drag and Drop
                                                                </h6>
                                                                <p class="text-muted">SVG, PNG, JPG (Max 800*400px)</p>
                                                                <input type="file" multiple id="image_sign">
                                                                <div id="frames"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}

                                                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label>RC Book</label>
                                                        <div class="form-group service-upload logo-upload mb-0">
                                                            <span><img src="{{ asset('assets/img/icons/img-drop.svg') }}"
                                                                    alt="upload"></span>
                                                            <div class="drag-drop">
                                                                <h6 class="drop-browse align-center">
                                                                    <span class="text-info me-1">Click to Replace
                                                                    </span>
                                                                    or Drag and Drop
                                                                </h6>
                                                                <p class="text-muted">SVG, PNG, JPG (Max 800*400px)</p>
                                                                <input type="file" multiple id="image_sign"
                                                                    name="rc_book">
                                                                <div id="frames"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label>Insurance </label>
                                                        <div class="form-group service-upload logo-upload mb-0">
                                                            <span><img src="{{ asset('assets/img/icons/img-drop.svg') }}"
                                                                    alt="upload"></span>
                                                            <div class="drag-drop">
                                                                <h6 class="drop-browse align-center">
                                                                    <span class="text-info me-1">Click to Replace
                                                                    </span>
                                                                    or Drag and Drop
                                                                </h6>
                                                                <p class="text-muted">SVG, PNG, JPG (Max 800*400px)</p>
                                                                <input type="file" multiple id="image_sign"
                                                                    name="insurance_file">
                                                                <div id="frames"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex">
                                                <a class="btn btn btn-primary previous me-2"> Back</a>
                                                <a class="btn btn btn-primary next">Continue</a>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" role="tabpanel" id="step4"
                                            aria-labelledby="step4-tab">
                                            <div class="mb-2 d-flex justify-content-start align-items-center">
                                                <h5>Loan Details</h5>

                                                <div class="d-flex ms-4">
                                                    {{-- <a href="#" class="image_icons me-2" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="WhatsApp"> <img
                                                            src="{{ asset('assets/img/whatsapp.svg') }}" />
                                                    </a> --}}
                                                    <a id="editPrintButton" class="image_icons" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Print"><img
                                                            src="{{ asset('assets/img/print.svg') }}" />
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="card table-card">

                                                <div class="">

                                                    <div class="mb-3">
                                                        <h6 class="mb-2"><b>Customer Name :</b>
                                                            <span
                                                                id="loan-detail-customer-name">{{ $customer->first_name }}</span>
                                                        </h6>
                                                        <h6 class="mb-2"><b>Executive :</b>
                                                            <span
                                                                id="loan-detail-executive-name">{{ $customer->executive_name }}</span>
                                                        </h6>
                                                        <h6 class="mb-2"><b>Finance :</b>
                                                            <span
                                                                id="loan-detail-finance-name">{{ $customer->finance_name }}</span>
                                                        </h6>
                                                    </div>
                                                    <div class="rounded  bg-light-primary">
                                                        <div class="row justify-content-start">
                                                            <div class="col-auto" id="loan-details">
                                                                <div class="table-responsive">
                                                                    <table class="table table-borderless text-end mb-0">
                                                                        <tbody>


                                                                            <tr>
                                                                                <th>Loan Amount </th>
                                                                                <th>:</th>
                                                                                <td><input type="number"
                                                                                        class="form-control "
                                                                                        value="{{ $customer->loan_amount }}"
                                                                                        id="loan-amount"
                                                                                        name="loan_amount">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Interest Rate (%) </th>
                                                                                <th>:</th>
                                                                                <td><input type="text"
                                                                                        class="form-control "
                                                                                        value="{{ $customer->interest_rate }}"
                                                                                        id="interest-rate"
                                                                                        name="interest_rate">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Loan Term (Months) </th>
                                                                                <th>:</th>
                                                                                <td><input type="number"
                                                                                        class="form-control "
                                                                                        value="{{ $customer->loan_term }}"
                                                                                        id="loan-term" name="loan_term">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>EMI </th>
                                                                                <th>:</th>
                                                                                <td><input type="number"
                                                                                        class="form-control "
                                                                                        value="{{ $customer->emi }}"
                                                                                        id="emi-result" name="emi"
                                                                                        readonly>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Loan Suraksha Vimo </th>
                                                                                <th>:</th>
                                                                                <td><input type="text"
                                                                                        class="form-control "
                                                                                        value="{{ $customer->loan_surakhya_vimo }}"
                                                                                        id="loan-suraksha-vimo"
                                                                                        name="loan_surakhya_vimo"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>IHO </th>
                                                                                <th>:</th>
                                                                                <td><input type="text"
                                                                                        class="form-control "
                                                                                        value="{{ $customer->iho }}"
                                                                                        id="iho" name="iho">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Total File Charge </th>
                                                                                <th>:</th>
                                                                                <td><input type="text"
                                                                                        class="form-control "
                                                                                        value="{{ $customer->file_charge }}"
                                                                                        id="cutoff-fee"
                                                                                        name="file_charge">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Road Side Assite </th>
                                                                                <th>:</th>
                                                                                <td><input type="text"
                                                                                        class="form-control "
                                                                                        value="{{ $customer->road_side_assite }}"
                                                                                        id="road-side-assite"
                                                                                        name="road_side_assite"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>RTO </th>
                                                                                <th>:</th>
                                                                                <td><input type="text"
                                                                                        class="form-control "
                                                                                        value="{{ $customer->rto_charge }}"
                                                                                        id="rto" name="rto_charge">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Hold for Insurance & Taxi to PVT
                                                                                </th>
                                                                                <th>:</th>
                                                                                <td><input type="text"
                                                                                        class="form-control "
                                                                                        value="{{ $customer->hold_for_insurance }}"
                                                                                        id="hold-for-insurance"
                                                                                        name="hold_for_insurance"></td>

                                                                            </tr>
                                                                            <tr>
                                                                                <th>Remark</th>
                                                                                <th class="dotted">:</th>
                                                                                <td>
                                                                                    <textarea class="form-control" id="loan_detail_remark" name="remark_loan_detail">{{ $customer->remark_loan_detail }}</textarea>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Loan Status
                                                                                </th>
                                                                                <th class="dotted">:</th>
                                                                                <td>
                                                                                    <select class="select basic"
                                                                                        id="loan-status"
                                                                                        name="loan_status">
                                                                                        <option>Select Status</option>
                                                                                        <option value="Processing"
                                                                                            {{ $customer->loan_status == 'Processing' ? 'selected' : '' }}>
                                                                                            Processing</option>
                                                                                        <option value="Approved"
                                                                                            {{ $customer->loan_status == 'Approved' ? 'selected' : '' }}>
                                                                                            Approved</option>
                                                                                        <option value="Rejected"
                                                                                            {{ $customer->loan_status == 'Rejected' ? 'selected' : '' }}>
                                                                                            Rejected</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-0 pt-0">
                                                                                    <hr class="mb-3 mt-0">
                                                                                    <h5 class="text-primary m-r-10">
                                                                                        Total
                                                                                        Remaining </h5>
                                                                                </td>
                                                                                <td>:</td>
                                                                                <td class="ps-0 pt-0 pb-4">
                                                                                    <hr class="mb-3 mt-0">
                                                                                    <h5 class="text-primary"><span
                                                                                            id="total-remaining">{{ $customer->final_total_amount }}</span>
                                                                                    </h5>
                                                                                </td>
                                                                                <input type="hidden"
                                                                                    name="final_total_amount"
                                                                                    id="final-update-total-amount"
                                                                                    value="" />
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <div class="">
                                                    <a class="btn btn-primary previous me-2"> Back</a>
                                                    <a class="btn btn-primary next">Continue</a>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="tab-pane fade" role="tabpanel" id="step5"
                                            aria-labelledby="step5-tab">
                                            <div class="mb-4">
                                                <h5> Bank Details</h5>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Account Holder Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Account Holder Name"
                                                            name="bank_account_holder_name"
                                                            value="{{ $customer->bank_account_holder_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Account Number</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Account Number" name="account_no"
                                                            value="{{ $customer->account_no }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Bank Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Bank Name" name="bank_name"
                                                            value="{{ $customer->bank_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Branch Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Branch Name" name="branch_name"
                                                            value="{{ $customer->branch_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>IFSC Code</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter IFSC Code" name="ifsc_code"
                                                            value="{{ $customer->ifsc_code }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label> Transfer Loan Amount</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Loan Amount" name="transfer_loan_amount"
                                                            value="{{ $customer->transfer_loan_amount }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex">
                                                <a class="btn btn-primary previous me-2">Previous</a>
                                                {{-- <a class="btn btn-primary next" data-bs-toggle="modal"
                                                    data-bs-target="#save_modal">Save Changes</a> --}}
                                                <button class="btn btn-primary" type="submit"
                                                    id="update-application">Update Data</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <div class="modal custom-modal fade" id="save_modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Confirm Save Changes</h3>
                        <p>Are you sure want to Confirm Save Changes?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <button type="reset" data-bs-dismiss="modal"
                                    class="w-100 btn btn-primary paid-continue-btn" id="type-success">Save
                                    Changes</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" data-bs-dismiss="modal"
                                    class="w-100 btn btn-primary paid-cancel-btn" id="type-error">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal custom-modal fade" id="add_state" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <div class="form-header modal-header-title text-start mb-0">
                        <h4 class="mb-0">Add New State</h4>
                    </div>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="align-center" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group mb-0">
                                <label>State <span class="text-danger">*</span></label>
                                <input type="text" id="edit-application-modal-state-name" class="form-control"
                                    placeholder="Enter State Name">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" data-bs-dismiss="modal" class="btn btn-danger me-2">Cancel</a>
                    <a href="#" data-bs-dismiss="modal" class="btn btn-primary"
                        id="edit-application-add-state">Save</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal custom-modal fade" id="add_city" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <div class="form-header modal-header-title text-start mb-0">
                        <h4 class="mb-0">Add New City</h4>
                    </div>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="align-center" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group mb-0">
                                <label>City <span class="text-danger">*</span></label>
                                <input type="text" id="edit-application-modal-city-name" class="form-control"
                                    placeholder="Enter City Name">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" data-bs-dismiss="modal" class="btn btn-danger me-2">Cancel</a>
                    <a href="#" data-bs-dismiss="modal" class="btn btn-primary"
                        id="edit-application-modal-save-city-btn">Save</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal custom-modal fade" id="add_village" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <div class="form-header modal-header-title text-start mb-0">
                        <h4 class="mb-0">Add New Village</h4>
                    </div>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="align-center" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group mb-0">
                                <label>Village <span class="text-danger">*</span></label>
                                <input type="text" id="edit-application-modal-village-name" class="form-control"
                                    placeholder="Enter Village Name">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" data-bs-dismiss="modal" class="btn btn-danger me-2">Cancel</a>
                    <a href="#" data-bs-dismiss="modal" class="btn btn-primary"
                        id="edit-application-modal-add-village-btn">Save</a>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('assets/js/customer-application-form.js') }}"></script>
    @endpush
    <script>
        // // dynamic country, state and city
        // function editApplicationcountryList() {
        //     const formData = new FormData();

        //     axios
        //         .get("/countries", formData)
        //         .then((response) => {

        //             const countryData = response.data;
        //             const countrySelectBox = $('#edit_application_country_name');
        //             countryData.forEach(function(country) {
        //                 countrySelectBox.append($('<option>', {
        //                     value: country.id,
        //                     text: country.country_name,
        //                     'data-secondary-value': country.id
        //                 }));
        //             });

        //             // append countries in add state modal
        //             $('#modal_country_name').html("");
        //             const modalCountrySelectBox = $('#modal_country_name');
        //             modalCountrySelectBox.append('<option>Select Country</option>')
        //             countryData.forEach(function(modalCountry) {
        //                 modalCountrySelectBox.append($('<option>', {
        //                     value: modalCountry.country_name,
        //                     text: modalCountry.country_name
        //                 }));
        //             });
        //         })
        //         .catch((error) => {
        //             console.error(error);
        //         });
        // }
        // editApplicationcountryList();

        // State List
        function editApplicationstateList() {
            var selectedOption = $('#edit_application_country_name option:selected');
            let country_id = selectedOption.data('secondary-value');
            console.log(country_id);

            axios
                .get("/states")
                .then((response) => {
                    $('#edit_application_state_name').html("");

                    const stateData = response.data;

                    const stateSelectBox = $('#edit_application_state_name');
                    stateSelectBox.append('<option>Select State</option>')
                    stateData.forEach(function(state) {
                        stateSelectBox.append($('<option>', {
                            value: state.id,
                            text: state.state_name
                        }));
                    });
                })
                .catch((error) => {
                    console.error(error);
                });
        }

        // on country change
        // $('#edit_application_country_name').change(function() {
        //     editApplicationstateList();

        // })


        // City list
        function editApplicationCityList() {


            axios
                .get("/cities")
                .then((response) => {
                    $('#edit_application_city_name').html("");

                    const cityData = response.data;

                    const citySelectBox = $('#edit_application_city_name');
                    citySelectBox.append('<option>Select City</option>')
                    cityData.forEach(function(city) {
                        citySelectBox.append($('<option>', {
                            value: city.id,
                            text: city.city_name
                        }));
                    });


                })
                .catch((error) => {
                    console.error(error);
                });
        }

        // on state change
        // $('#edit_application_state_name').change(function() {
        //     cityList();
        //     // set value in modal city
        //     // get selected state id and name
        //     var selectedStateId = $('#edit_application_state_name').val();
        //     var selectedText = $("#edit_application_state_name option:selected").text();
        //     $('#modal-state-name-option').val(selectedStateId);
        //     $('#modal-state-name-option').text(selectedText);

        // })

        // // Village list
        function EditApplicationVillageList() {


            axios
                .get("/villages")
                .then((response) => {
                    $('#edit_application_village_name').html("");

                    const villageData = response.data;

                    const villageSelectBox = $('#edit_application_village_name');
                    villageSelectBox.append('<option>Select Village</option>')
                    villageData.forEach(function(village) {
                        villageSelectBox.append($('<option>', {
                            value: village.id,
                            text: village.village_name
                        }));
                    });
                })
                .catch((error) => {
                    console.error(error);
                });
        }

        // on city change
        // $('#city_name').change(function() {
        //     $('#village_name').html("");
        //     villageList();

        //     // set value of city in modal Village
        //     // get selected state id and name
        //     var selectedCityId = $('#city_name').val();
        //     var selectedCityText = $("#city_name option:selected").text();
        //     $('#modal-city-name-option').val(selectedCityId);
        //     $('#modal-city-name-option').text(selectedCityText);

        // })


        // Add state
        function editApplicationAddState() {
            var modalStateName = $('#edit-application-modal-state-name').val();

            const formData = new FormData();
            formData.append('state_name', modalStateName);



            axios
                .post("/add-state", formData)
                .then((response) => {

                    editApplicationstateList();
                    toastr.success("State added Successfully");

                })
                .catch((error) => {
                    console.error(error);
                });
        }

        // Add state api call
        $("#edit-application-add-state").click(function() {

            var mStateName = $('#edit-application-modal-state-name').val();
            if (mStateName == '') {
                toastr.error("Please Enter state name")
            } else {
                // Call function
                editApplicationAddState();
            }
        });

        // Add Viilage
        function EditApplicationAddVillage(villageName) {


            const formData = new FormData();
            formData.append('village_name', villageName);


            axios
                .post("/add-village", formData)
                .then((response) => {

                    EditApplicationVillageList();

                })
                .catch((error) => {
                    console.error(error);
                });
        }


        // Call add village function
        $("#edit-application-modal-add-village-btn").click(function() {

            var modalVillageName = $('#edit-application-modal-village-name').val();

            if (modalVillageName == '') {
                toastr.error("Please Enter village name")

            } else {
                // Call function
                EditApplicationAddVillage(modalVillageName);
            }
        });

        // Add City
        function editApplicationAddCity(cityName) {


            const formData = new FormData();
            formData.append('edit_application_city_name', cityName);


            axios
                .post("/add-city", formData)
                .then((response) => {
                    toastr.success("City succefully added");
                    editApplicationCityList();

                })
                .catch((error) => {
                    console.error(error);
                });
        }

        // Call add City function
        $("#edit-application-modal-save-city-btn").click(function() {

            var modalCityName = $('#edit-application-modal-city-name').val();

            if (modalCityName == '') {
                toastr.error("Please Enter city name")
            } else {
                // Call function
                editApplicationAddCity(modalCityName);
            }
        });



        // Set total remain remaining loan amount
        document.getElementById('update-application').addEventListener('click', function() {
            var spanValue = document.getElementById('total-remaining').textContent;
            document.getElementById('final-update-total-amount').value = spanValue;
        });


        // generate PDF of load details
        $("#editPrintButton").on("click", function() {
            var printWindow = window.open('', '', 'width=600,height=600');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Print</title></head><body>' + getContentToPrint() +
                '</body></html>');
            printWindow.document.close();
            printWindow.print();
            printWindow.close();
        });

        function getContentToPrint() {
            var loanAmount = $("#loan-amount").val();
            var interestRate = $("#interest-rate").val();
            var emi = $("#emi-result").val();
            var customerName = $('#loan-detail-customer-name').text();
            var executiveName = $('#loan-detail-executive-name').text();
            var financeName = $('#loan-detail-finance-name').text();
            var loanTerm = $('#loan-term').val();

            var loansurakshyaVimo = $('#loan-suraksha-vimo').val();
            var iho = $('#iho').val();
            var totalFileCharge = $('#cutoff-fee').val();
            var roadSiteAssite = $('#road-side-assite').val();
            var rto = $('#rto').val();
            var holdForInsu = $('#hold-for-insurance').val();
            var loanStatus = $('#loan-status').val();



            var remarks = $("#loan_detail_remark").val();
            var remainingAmount = $('#total-remaining').text();
            var imageUrl = '{{ asset('assets/img/logo.svg') }}';
            return `
          <div id="print-loan-detail" style="background:#d3eafd;padding:10px 10px;border-radius:10px;">
            <img src="${imageUrl}" alt="Company Logo" style="max-width: 50%; height: auto; margin-top: 10px;">

            <p style="color:#28084b;font-weight:600;font-family: system-ui;">Customer Name: <span style="color:black;font-weight:500">${customerName}</span></p>
            <p style="color:#28084b;font-weight:600;font-family: system-ui;">Executive Name : <span style="color:black;font-weight:500">${executiveName}</span></p>
            <p style="color:#28084b;font-weight:600;font-family: system-ui;">Finance Name : <span style="color:black;font-weight:500"> ${financeName}</span></p>
            <h2 style="border-bottom:1px solid gray;margin:0;padding-bottom:10px;font-family: system-ui;">Loan Details</h2>
            <p style="color:black;font-weight:700;font-family: system-ui;">Loan Amount(INR): <span style="color:black;font-weight:500;font-family: system-ui;">${loanAmount}</span></p>
            <p style="color:black;font-weight:700;font-family: system-ui;">Interest Rate(%): <span style="color:black;font-weight:500;font-family: system-ui;">${interestRate}</span></p>
            <p style="color:black;font-weight:700;font-family: system-ui;">Terms(Months): <span style="color:black;font-weight:500;font-family: system-ui;">${loanTerm}</span></p>
            <p style="color:black;font-weight:700;font-family: system-ui;">EMI(INR): <span style="color:black;font-weight:500;font-family: system-ui;">${emi}</span></p>


            <p style="color:black;font-weight:700;font-family: system-ui;">Loan Suraksha Vimo: <span style="color:black;font-weight:500;font-family: system-ui;">${loansurakshyaVimo}</span></p>
            <p style="color:black;font-weight:700;font-family: system-ui;">IHO: <span style="color:black;font-weight:500;font-family: system-ui;">${iho}</span></p>
            <p style="color:black;font-weight:700;font-family: system-ui;">Total File Charge: <span style="color:black;font-weight:500;font-family: system-ui;">${totalFileCharge}</span></p>
            <p style="color:black;font-weight:700;font-family: system-ui;">Road Side Assite: <span style="color:black;font-weight:500;font-family: system-ui;">${roadSiteAssite}</span></p>
            <p style="color:black;font-weight:700;font-family: system-ui;">RTO: <span style="color:black;font-weight:500;font-family: system-ui;">${rto}</span></p>
            <p style="color:black;font-weight:700;font-family: system-ui;">Hold for Insurance & Taxi to PVT: <span style="color:black;font-weight:500;font-family: system-ui;">${holdForInsu}</span></p>
            <p style="color:black;font-weight:700;font-family: system-ui;">Loan Status: <span style="color:black;font-weight:500;font-family: system-ui;">${loanStatus}</span></p>

            <p style="color:black;font-weight:700;font-family: system-ui;">Remarks: <span style="color:black;font-weight:500;font-family: system-ui;">${remarks}</span></p>
            <h2 style="border-bottom:1px solid gray;margin:0;padding-bottom:10px;font-family: system-ui;"></h2>
            <p style="color:black;font-weight:700;font-family: system-ui;">Total Remaining Amount(INR): <span style="color:black;font-weight:500;font-family: system-ui;">${remainingAmount}</span></p>
          </div>
        `;
        }
    </script>
@endsection
