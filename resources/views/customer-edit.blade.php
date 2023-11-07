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

                                                <div class="col-lg-4 col-12">
                                                    <div class="form-group mb-3">
                                                        <label>Country</label>
                                                        <select class="select" name="country">
                                                            <option>Select Country</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-12">
                                                    <div class="flex_row">
                                                        <div class="form-group mb-3">
                                                            <label>State</label>
                                                            <select class="select" name="state">
                                                                <option>Select State</option>

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
                                                            <label>City</label>
                                                            <select class="select" name="city">
                                                                <option>Select City</option>

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
                                                            <select class="select" name="village">
                                                                <option>Select Village</option>

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
                                                <div class="col-lg-12">
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
                                                    <a href="#" class="image_icons me-2" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="WhatsApp"> <img
                                                            src="{{ asset('assets/img/whatsapp.svg') }}" />
                                                    </a>
                                                    <a href="#" class="image_icons" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Print"><img data-fancybox
                                                            src="{{ asset('assets/img/print.svg') }}" />
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="card table-card">

                                                <div class="">

                                                    <div class="mb-3">
                                                        <h6 class="mb-2"><b>Customer Name :</b>
                                                            {{ $customer->first_name }}</h6>
                                                        <h6 class="mb-2"><b>Executive :</b>
                                                            {{ $customer->executive_name }}</h6>
                                                        <h6 class="mb-2"><b>Finance :</b> {{ $customer->finance_name }}
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
                                                                                <td><input type="number"
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
                                                                                <th>Remark</th>
                                                                                <th>:</th>
                                                                                <td>
                                                                                    <textarea class="form-control" value="" id="" name="remark_loan_detail"></textarea>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Loan Status
                                                                                </th>
                                                                                <th>:</th>
                                                                                <td><input type="text"
                                                                                        class="form-control "
                                                                                        name="loan_status"
                                                                                        value="{{ $customer->loan_status }}">
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
                                            </div>

                                            <div class="d-flex">
                                                <a class="btn btn-primary previous me-2">Previous</a>
                                                {{-- <a class="btn btn-primary next" data-bs-toggle="modal"
                                                    data-bs-target="#save_modal">Save Changes</a> --}}
                                                <button class="btn btn-primary" type="submit">Update Data</button>
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
                                <input type="text" class="form-control" placeholder="Enter State Name">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" data-bs-dismiss="modal" class="btn btn-danger me-2">Cancel</a>
                    <a href="#" data-bs-dismiss="modal" class="btn btn-primary" id="type-info">Save</a>
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
                                <input type="text" class="form-control" placeholder="Enter City Name">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" data-bs-dismiss="modal" class="btn btn-danger me-2">Cancel</a>
                    <a href="#" data-bs-dismiss="modal" class="btn btn-primary">Save</a>
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
                                <input type="text" class="form-control" placeholder="Enter Village Name">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" data-bs-dismiss="modal" class="btn btn-danger me-2">Cancel</a>
                    <a href="#" data-bs-dismiss="modal" class="btn btn-primary">Save</a>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        $(document).ready(function() {
            $("#loan-amount, #interest-rate, #loan-term, #cutoff-fee, #loan-suraksha-vimo, #loan-suraksha-vimo,  #iho, #road-side-assite, #rto, #hold-for-insurance")
                .on("input", function() {
                    calculateLoan();
                });

            function calculateLoan() {
                let loanAmount = parseFloat($("#loan-amount").val() || 0);
                let annualInterestRate = parseFloat($("#interest-rate").val() || 0);
                let loanTermMonths = parseFloat($("#loan-term").val() || 0);
                let cutoffFee = parseFloat($("#cutoff-fee").val() || 0);
                let loanSurakshaVimo = parseFloat($("#loan-suraksha-vimo").val() || 0);
                let iho = parseFloat($("#iho").val() || 0);
                let roadSideAssite = parseFloat($("#road-side-assite").val() || 0);
                let rto = parseFloat($("#rto").val() || 0);
                let holdForInsurance = parseFloat($("#hold-for-insurance").val() || 0)


                if (loanAmount > 0 && annualInterestRate > 0 && loanTermMonths > 0) {
                    let monthlyInterestRate = (annualInterestRate / 12) / 100;
                    let emi = calculateEMI(loanAmount, monthlyInterestRate, loanTermMonths);
                    // let totalRemaining = (emi * loanTermMonths) + cutoffFee;
                    let totalRemaining = loanAmount - cutoffFee - loanSurakshaVimo - iho - roadSideAssite - rto -
                        holdForInsurance;


                    $("#emi-result").val(emi.toFixed(2));
                    $("#total-remaining").text(totalRemaining.toFixed(2));
                } else {
                    $("#emi-result").text("0.00");
                    $("#total-remaining").text("0.00");
                }
            }

            function calculateEMI(loanAmount, monthlyInterestRate, loanTermMonths) {
                let emi = loanAmount * monthlyInterestRate * Math.pow(1 + monthlyInterestRate, loanTermMonths) / (
                    Math.pow(1 + monthlyInterestRate, loanTermMonths) - 1);
                return emi;
            }



            // $("#loan-detail-print-btn").on("click", function() {
            //     var contentToPrint = $("#loan-details").html();
            //     var $printWindow = window.open('', '', 'width=600,height=600');
            //     $printWindow.document.open();
            //     $printWindow.document.write('<html><head><title>Print</title></head><body>' +
            //         contentToPrint + '</body></html>');
            //     $printWindow.document.close();
            //     $printWindow.print();
            //     $printWindow.close();
            // });
        });
    </script> --}}
@endsection
