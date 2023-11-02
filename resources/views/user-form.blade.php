@extends('layouts.master')
@section('main-container')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="card">
            <div class="rounded  p-3">
                <ol class="breadcrumb breadcrumb-dot text-muted mb-0">
                    <li class="breadcrumb-item">
                        <a href="index.html">Home</a>
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
                        <div class="wizard">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Customer Info">
                                    <a class="nav-link active d-flex align-items-center justify-content-center" href="#step1" id="step1-tab" data-bs-toggle="tab" role="tab" aria-controls="step1"
                                        aria-selected="true">
                                        <i class="far fa-user-circle"></i> Customer Info
                                    </a>
                                </li>
                                <li class="nav-item " role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Borrower Info">
                                    <a class="nav-link  d-flex align-items-center justify-content-center" href="#step2" id="step2-tab" data-bs-toggle="tab" role="tab" aria-controls="step2"
                                        aria-selected="false">
                                        <i class="far fa-dollar-sign"></i> Borrower Info
                                    </a>
                                </li>
                                <li class="nav-item " role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Vehicle Details">
                                    <a class="nav-link  d-flex align-items-center justify-content-center" href="#step3" id="step3-tab" data-bs-toggle="tab" role="tab" aria-controls="step3"
                                        aria-selected="false">
                                        <i class="fa fa-car"></i> Vehicle Details
                                    </a>
                                </li>
                                <li class="nav-item " role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Loan Details">
                                    <a class="nav-link  d-flex align-items-center justify-content-center" href="#step4" id="step4-tab" data-bs-toggle="tab" role="tab" aria-controls="step4"
                                        aria-selected="false">
                                        <i class="fa fa-file"></i> Loan Details
                                    </a>
                                </li>

                                <li class="nav-item " role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Customer Bank Details">
                                    <a class="nav-link  d-flex align-items-center justify-content-center" href="#step5" id="step5-tab" data-bs-toggle="tab" role="tab" aria-controls="step5"
                                        aria-selected="false">
                                        <i class="fa fa-university"></i> Customer Bank Details
                                    </a>
                                </li>

                                <!-- <li class="nav-item " role="presentation" data-bs-toggle="tooltip" data-bs-placement="top" title="Registration Form">
                                                                                                                <a class="nav-link  d-flex align-items-center justify-content-center" href="#step6" id="step6-tab" data-bs-toggle="tab" role="tab" aria-controls="step6"
                                                                                                                    aria-selected="false">
                                                                                                                    Registration Form
                                                                                                                </a>
                                                                                                            </li> -->

                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" role="tabpanel" id="step1" aria-labelledby="step1-tab">

                                    <form>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-title">
                                                    <h5>Customer Info</h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter First Name">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter Last Name">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" placeholder="Enter Email Address">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Mobile No</label>
                                                    <input type="number" class="form-control" placeholder="Enter Mobile No">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-title">
                                                    <h5>Address Information</h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea type="text" class="form-control" placeholder="Enter your Address"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-12">
                                                <div class="form-group mb-3">
                                                    <label>Country</label>
                                                    <select class="select">
                                                        <option>Select Country</option>
                                                        <option>Options 1</option>
                                                        <option>Options 2</option>
                                                        <option>Options 3</option>
                                                        <option>Options 4</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-12">
                                                <div class="flex_row">
                                                    <div class="form-group mb-3">
                                                        <label>State</label>
                                                        <select class="select">
                                                            <option>Select State</option>
                                                            <option>Options 1</option>
                                                            <option>Options 2</option>
                                                            <option>Options 3</option>
                                                            <option>Options 4</option>
                                                        </select>
                                                    </div>
                                                    <a class="btn btn-success form-plus-btn" href="#" data-bs-toggle="modal" data-bs-target="#add_state">
                                                        <i class="fe fe-plus-circle"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-12">
                                                <div class="flex_row">
                                                    <div class="form-group mb-3">
                                                        <label>City</label>
                                                        <select class="select">
                                                            <option>Select City</option>
                                                            <option>Options 1</option>
                                                            <option>Options 2</option>
                                                            <option>Options 3</option>
                                                            <option>Options 4</option>
                                                        </select>
                                                    </div>
                                                    <a class="btn btn-secondary form-plus-btn" href="#" data-bs-toggle="modal" data-bs-target="#add_city">
                                                        <i class="fe fe-plus-circle"></i>
                                                    </a>
                                                </div>

                                            </div>

                                            <div class="col-lg-4 col-12">
                                                <div class="flex_row">
                                                    <div class="form-group mb-3">
                                                        <label>Village</label>
                                                        <select class="select">
                                                            <option>Select Village</option>
                                                            <option>Options 1</option>
                                                            <option>Options 2</option>
                                                            <option>Options 3</option>
                                                            <option>Options 4</option>
                                                        </select>
                                                    </div>
                                                    <a class="btn btn-primary form-plus-btn" href="#" data-bs-toggle="modal" data-bs-target="#add_village">
                                                        <i class="fe fe-plus-circle"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Alternate Mobile No</label>
                                                    <input type="text" class="form-control" placeholder="Enter Mobile Number">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Aadhar Card</label>
                                                    <div class="form-group service-upload logo-upload mb-0">
                                                        <span><img src="assets/img/icons/img-drop.svg" alt="upload"></span>
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
                                            </div>

                                        </div>

                                    </form>
                                    <div class="d-flex">
                                        <a class="btn btn btn-primary next">Next</a>
                                    </div>
                                </div>

                                <div class="tab-pane fade" role="tabpanel" id="step2" aria-labelledby="step2-tab">
                                    <div class="mb-4">
                                        <h5>Borrower Info</h5>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="basicpill-pancard-input" class="form-label">Finance Name</label>
                                                    <input type="text" class="form-control" id="basicpill-pancard-input" placeholder="Enter Finance Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="basicpill-vatno-input" class="form-label">Finance Address</label>
                                                    <textarea class="form-control" placeholder="Enter Finance Address"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Executive Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter Executive Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Dealer Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter Dealer Name">
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                    <div class="d-flex">
                                        <a class="btn btn btn-primary previous me-2"> Back</a>
                                        <a class="btn btn btn-primary next">Continue</a>
                                    </div>
                                </div>

                                <div class="tab-pane fade" role="tabpanel" id="step3" aria-labelledby="step3-tab">
                                    <div class="mb-4">
                                        <h5>Vehicle Details</h5>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Vehicle Type</label>
                                                    <input type="text" class="form-control" placeholder="Enter Vehicle Type">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Vehicle Registration Number</label>
                                                    <input type="text" class="form-control" placeholder="Enter Vehicle Registration Number">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Registration Year</label>
                                                    <input type="text" class="form-control" placeholder="Enter Registration Year">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Chasis Number </label>
                                                    <input type="text" class="form-control" placeholder="Enter Chasis Number">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Engine Number </label>
                                                    <input type="text" class="form-control" placeholder="Enter Engine Number">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Fuel Type</label>
                                                    <input type="text" class="form-control" placeholder="Enter Fuel Type">
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Insurance Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter Insurance Name">
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
                                                        <span><img src="assets/img/icons/img-drop.svg" alt="upload"></span>
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
                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                                <div class="form-group">
                                                    <label>Insurance </label>
                                                    <div class="form-group service-upload logo-upload mb-0">
                                                        <span><img src="assets/img/icons/img-drop.svg" alt="upload"></span>
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
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex">
                                        <a class="btn btn btn-primary previous me-2"> Back</a>
                                        <a class="btn btn btn-primary next">Continue</a>
                                    </div>
                                </div>

                                <div class="tab-pane fade" role="tabpanel" id="step4" aria-labelledby="step4-tab">
                                    <div class="mb-2 d-flex justify-content-between align-items-center">
                                        <h5>Loan Details</h5>

                                        <div class="d-flex">
                                            <a href="#" class="image_icons me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="WhatsApp"> <img src="{{ asset('assets/img/whatsapp.svg') }}" /> </a>
                                            <a href="#"  class="image_icons" data-bs-toggle="tooltip" data-bs-placement="top" title="PDF"  ><img data-fancybox src="{{ asset('assets/img/pdf.svg') }}" /> </a>
                                        </div>
                                    </div>
                                    <form>
                                        <div class="card table-card">

                                            <div class="">
                                                <div class="rounded  bg-light-primary">
                                                    <div class="row justify-content-start">
                                                        <div class="col-auto">
                                                            <div class="table-responsive">
                                                                <table class="table table-borderless text-end mb-0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th>Loan Amount </th>
                                                                            <th>:</th>
                                                                            <td><input type="text" class="form-control " value="$77.00"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Loan Suraksha Vimo </th>
                                                                            <th>:</th>
                                                                            <td><input type="text" class="form-control " value="$11.00"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>IHO </th>
                                                                            <th>:</th>
                                                                            <td><input type="text" class="form-control " value="$100.00"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Total File Charge </th>
                                                                            <th>:</th>
                                                                            <td><input type="text" class="form-control " value="$57.00"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Road Side Assite </th>
                                                                            <th>:</th>
                                                                            <td><input type="text" class="form-control " value="$88.00"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>RTO </th>
                                                                            <th>:</th>
                                                                            <td><input type="text" class="form-control " value="$44.00"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Hold for Insurance & Taxi to PVT </th>
                                                                            <th>:</th>
                                                                            <td><input type="text" class="form-control " value="$66.00"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="pe-0 pt-0">
                                                                                <hr class="mb-3 mt-0">
                                                                                <h5 class="text-primary m-r-10">Total Outstanding </h5>
                                                                            </td>
                                                                            <td>:</td>
                                                                            <td class="ps-0 pt-0 pb-4">
                                                                                <hr class="mb-3 mt-0">
                                                                                <h5 class="text-primary">$ 4827.00</h5>
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
                                    </form>
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <a class="btn btn-primary previous me-2"> Back</a>
                                            <a class="btn btn-primary next">Continue</a>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-pane fade" role="tabpanel" id="step5" aria-labelledby="step5-tab">
                                    <div class="mb-4">
                                        <h5> Bank Details</h5>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Account Holder Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter Account Holder Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>Account Number</label>
                                                    <input type="text" class="form-control" placeholder="Enter Account Number">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Bank Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter Bank Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>Branch</label>
                                                    <input type="text" class="form-control" placeholder="Enter Branch Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>IFSC</label>
                                                    <input type="text" class="form-control" placeholder="Enter IFSC Code">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex">
                                        <a class="btn btn-primary previous me-2">Previous</a>
                                        <a class="btn btn-primary next" data-bs-toggle="modal" data-bs-target="#save_modal">Save Changes</a>
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
                            <button type="reset" data-bs-dismiss="modal" class="w-100 btn btn-primary paid-continue-btn" id="type-success">Save
                                Changes</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" data-bs-dismiss="modal" class="w-100 btn btn-primary paid-cancel-btn" id="type-error">Cancel</button>
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
@endsection