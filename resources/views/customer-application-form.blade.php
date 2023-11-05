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
                            <h4 class="card-title mb-0">Loan Application Form</h4>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">
                                @csrf
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
                                                            value="{{ old('first_name') }}"
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
                                                            name="last_name" value="{{ old('last_name') }}"
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
                                                        <input type="text" name="surname" value="{{ old('surname') }}"
                                                            class="form-control @error('surname') is-invalid
                                        
                                                        @enderror"
                                                            placeholder="Enter Surname">
                                                    </div>
                                                    @error('surname')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" name="email"
                                                            class="form-control @error('email') is-invalid
                                        
                                                        @enderror"
                                                            value="{{ old('email') }}" placeholder="Enter Email Address">
                                                    </div>
                                                    @error('email')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-4 col-md-6 col-sm-12">

                                                    <div class="form-group">
                                                        <label>Mobile No<span class="text-danger">*</span></label>
                                                        <input type="number" name="mobile_no"
                                                            value="{{ old('mobile_no') }}"
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
                                                            placeholder="Enter Mobile Number" name="alternate_mobile_no"
                                                            value="{{ old('alternate_mobile_no') }}">
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
                                                            placeholder="Enter your Address">{{ old('address') }}</textarea>
                                                    </div>
                                                    @error('address')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-4 col-12">
                                                    <div class="form-group mb-3">
                                                        <label>Country</label>
                                                        <select class="select" name="country" id="country_name">
                                                            <option value="">Select Country</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-12">
                                                    <div class="flex_row">
                                                        <div class="form-group mb-3">
                                                            <label>State</label>
                                                            <select class="select" name="state" id="state_name">
                                                                <option value="">Select State</option>

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
                                                            <select class="select" name="city" id="city_name">
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
                                                            <select class="select" name="village" id="village_name">
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
                                                            placeholder="Enter Pincode" name="pincode"
                                                            value="{{ old('pincode') }}">
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
                                                        <textarea type="text" name="remark_customer_detail" class="form-control" placeholder="Enter Remark">{{ old('remark_customer_detail') }}</textarea>
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
                                                            name="finance_name" value="{{ old('finance_name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="basicpill-vatno-input" class="form-label">Finance
                                                            Address</label>
                                                        <textarea class="form-control" placeholder="Enter Finance Address" name="finance_address">{{ old('finance_address') }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Executive Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Executive Name" name="executive_name"
                                                            value="{{ old('executive_name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Dealer Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Dealer Name" name="Dealer_name"
                                                            value="{{ old('Dealer_name') }}">
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
                                                            value="{{ old('vehicle_type') }}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Vehicle Registration Number</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Vehicle Registration Number"
                                                            name="vehicle_registration_no"
                                                            value="{{ old('vehicle_registration_no') }}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Registration Year</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Registration Year"
                                                            name="vehicle_registration_year"
                                                            value="{{ old('vehicle_registration_year') }}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Chasis Number </label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Chasis Number" name="chasis_no"
                                                            value="{{ old('chasis_no') }}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Engine Number </label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Engine Number" name="engine_no"
                                                            value="{{ old('engine_no') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Fuel Type</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Fuel Type" name="fuel_type"
                                                            value="{{ old('fuel_type') }}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Insurance Company Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Insurance Company Name"
                                                            name="insurance_company_name"
                                                            value="{{ old('insurance_company_name') }}">
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
                                                                <p class="text-muted">SVG, PNG, JPG (Max 800*400px)
                                                                </p>
                                                                <input type="file" multiple id="rc_book"
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
                                                                <p class="text-muted">SVG, PNG, JPG (Max 800*400px)
                                                                </p>
                                                                <input type="file" multiple id="insurance_file"
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
                                                    <a id="printButton" class="image_icons" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Print"><img
                                                            src="{{ asset('assets/img/print.svg') }}" />
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="card table-card" id="print-loan-detail">

                                                <div class="">

                                                    <div class="mb-3">
                                                        <h6 class="mb-2"><b>Customer Name :</b> Patel Rakesh</h6>
                                                        <h6 class="mb-2"><b>Executive :</b> Prakash Jain</h6>
                                                        <h6 class="mb-2"><b>Finance :</b> Kogta Palanpur</h6>
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
                                                                                        id="loan-amount"
                                                                                        name="loan_amount"
                                                                                        value="{{ old('loan_amount') }}">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Interest Rate (%) </th>
                                                                                <th>:</th>
                                                                                <td><input type="number"
                                                                                        class="form-control "
                                                                                        id="interest-rate"
                                                                                        name="interest_rate"
                                                                                        value="{{ old('interest_rate') }}">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Loan Term (Months) </th>
                                                                                <th>:</th>
                                                                                <td><input type="number"
                                                                                        class="form-control "
                                                                                        id="loan-term" name="loan_term"
                                                                                        value="{{ old('loan_term') }}">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>EMI </th>
                                                                                <th>:</th>
                                                                                <td><input type="number"
                                                                                        class="form-control "
                                                                                        id="emi-result" name="emi"
                                                                                        value="{{ old('emi') }}"
                                                                                        readonly>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Loan Suraksha Vimo </th>
                                                                                <th>:</th>
                                                                                <td><input type="text"
                                                                                        class="form-control "
                                                                                        id="loan-suraksha-vimo"
                                                                                        name="loan_surakhya_vimo"
                                                                                        value="{{ old('loan_surakhya_vimo') }}">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>IHO </th>
                                                                                <th>:</th>
                                                                                <td><input type="text"
                                                                                        class="form-control "
                                                                                        id="iho" name="iho"
                                                                                        value="{{ old('iho') }}">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Total File Charge </th>
                                                                                <th>:</th>
                                                                                <td><input type="text"
                                                                                        class="form-control "
                                                                                        id="cutoff-fee" name="file_charge"
                                                                                        value="{{ old('file_charge') }}">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Road Side Assite </th>
                                                                                <th>:</th>
                                                                                <td><input type="text"
                                                                                        class="form-control "
                                                                                        id="road-side-assite"
                                                                                        name="road_side_assite"
                                                                                        value="{{ old('road_side_assite') }}">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>RTO </th>
                                                                                <th>:</th>
                                                                                <td><input type="text"
                                                                                        class="form-control "
                                                                                        id="rto" name="rto_charge"
                                                                                        value="{{ old('rto_charge') }}">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Hold for Insurance & Taxi to PVT
                                                                                </th>
                                                                                <th>:</th>
                                                                                <td><input type="text"
                                                                                        class="form-control "
                                                                                        id="hold-for-insurance"
                                                                                        name="hold_for_insurance"
                                                                                        value="{{ old('hold_for_insurance') }}">
                                                                                </td>
                                                                                <th>Remark</th>
                                                                                <th>:</th>
                                                                                <td>
                                                                                    <textarea class="form-control" id="loan_detail_remark" name="remark_loan_detail">{{ old('remark_loan_detail') }}</textarea>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th>Loan Status
                                                                                </th>
                                                                                <th>:</th>
                                                                                <td><input type="text"
                                                                                        class="form-control "
                                                                                        name="loan_status"
                                                                                        value="{{ old('loan_status') }}">
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
                                                                                            id="total-remaining">0</span>
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
                                                            value="{{ old('bank_account_holder_name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Account Number</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Account Number" name="account_no"
                                                            value="{{ old('account_no') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Bank Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Bank Name" name="bank_name"
                                                            value="{{ old('bank_name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Branch Name</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter Branch Name" name="branch_name"
                                                            value="{{ old('branch_name') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>IFSC Code</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter IFSC Code" name="ifsc_code"
                                                            value="{{ old('ifsc_code') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex">
                                                <a class="btn btn-primary previous me-2">Previous</a>
                                                {{-- <a class="btn btn-primary next" data-bs-toggle="modal"
                                                    data-bs-target="#save_modal">Save Changes</a> --}}
                                                <button class="btn btn-primary" type="submit">Save</button>
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
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group mb-3">
                                <label>Select Country<span class="text-danger">*</span></label>
                                <select class="select" name="country" id="modal_country_name">

                                </select>
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
                                <input type="text" name="modal_village_name" id="modal_village_name"
                                    class="form-control" placeholder="Enter Village Name">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group mb-0">
                                <label>City/District<span class="text-danger">*</span></label>
                                <select class="select" name="city" id="modal_city_name">
                                    <option>Select City</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" data-bs-dismiss="modal" class="btn btn-danger me-2">Cancel</a>
                    <a href="#" data-bs-dismiss="modal" class="btn btn-primary" id="add_village">Add Village</a>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('assets/js/customer-application-form.js') }}"></script>
        <script src="{{ asset('assets/js/axios.js') }}"></script>
    @endpush
    <script>
        function countryList() {
            const formData = new FormData();

            axios
                .get("/countries", formData)
                .then((response) => {

                    const countryData = response.data;
                    const countrySelectBox = $('#country_name');
                    countryData.forEach(function(country) {
                        countrySelectBox.append($('<option>', {
                            value: country.id,
                            text: country.country_name
                        }));
                    });

                    // append countries in add state modal
                    $('#modal_country_name').html("");
                    const modalCountrySelectBox = $('#modal_country_name');
                    modalCountrySelectBox.append('<option>Select Country</option>')
                    countryData.forEach(function(modalCountry) {
                        modalCountrySelectBox.append($('<option>', {
                            value: modalCountry.id,
                            text: modalCountry.country_name
                        }));
                    });
                })
                .catch((error) => {
                    console.error(error);
                });
        }
        countryList();

        // State List
        function stateList() {
            let country_id = $('#country_name').val();

            axios
                .get("/states", {
                    params: {
                        country_id: country_id
                    }
                })
                .then((response) => {
                    $('#state_name').html("");

                    const stateData = response.data;

                    const stateSelectBox = $('#state_name');
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
        $('#country_name').change(function() {
            stateList();

        })


        // City list
        function cityList() {
            let state_id = $('#state_name').val();

            axios
                .get("/cities", {
                    params: {
                        state_id: state_id
                    }
                })
                .then((response) => {
                    $('#city_name').html("");

                    const cityData = response.data;

                    const citySelectBox = $('#city_name');
                    citySelectBox.append('<option>Select City</option>')
                    cityData.forEach(function(city) {
                        citySelectBox.append($('<option>', {
                            value: city.id,
                            text: city.city_name
                        }));
                    });

                    // Append data in add  village modal
                    $('#modal_city_name').html("");
                    const modalCitySelectBox = $('#modal_city_name');
                    modalCitySelectBox.append('<option value="">Select City </option>')
                    cityData.forEach(function(modalCity) {
                        modalCitySelectBox.append($('<option>', {
                            value: modalCity.id,
                            text: modalCity.city_name
                        }));
                    });
                })
                .catch((error) => {
                    console.error(error);
                });
        }

        // on state change
        $('#state_name').change(function() {
            cityList();
        })

        // Village list
        function villageList() {
            let city_id = $('#city_name').val();

            axios
                .get("/villages", {
                    params: {
                        city_id: city_id
                    }
                })
                .then((response) => {
                    $('#village_name').html("");

                    const villageData = response.data;

                    const villageSelectBox = $('#village_name');
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
        $('#city_name').change(function() {
            villageList();
        })


        // Add Viilage
        function addVillage() {
            var cityId = $('#modal_city_name').val();
            var villageName = $('#modal_village_name').val();

            const formData = new FormData();
            formData.append('village_name', villageName);
            formData.append('city_id', cityId);

            axios
                .post("/add-village", formData)
                .then((response) => {
                    villageList();

                })
                .catch((error) => {
                    console.error(error);
                });
        }


        // Call add village function
        $("#add_village").click(function() {
            var modalVillageName = $('#modal_village_name').val();
            var modalCityName = $('#modal_city_name').val();
            if (modalVillageName == '' || modalCityName == '') {

            } else {
                // Call function
                addVillage();
            }
        });



        // generate PDF of load details
        $("#printButton").on("click", function() {
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
            var remarks = $("#loan_detail_remark").val();

            return `
          <div id="print-loan-detail">
            <h1>Loan Details</h1>
            <p>Loan Amount: <span>${loanAmount}</span></p>
            <p>Interest Rate: <span>${interestRate}</span></p>
            <p>EMI: <span>${emi}</span></p>
            <p>Remarks: ${remarks}</p>
          </div>
        `;
        }
    </script>
@endsection
