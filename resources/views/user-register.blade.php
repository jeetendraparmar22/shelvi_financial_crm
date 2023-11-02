@extends('layouts.master');
@section('main-container')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Registration Form</h4>
                        </div>
                        <div class="card-body">
                            <div class="wizard">
                                <form>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Full Name">
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <input type="number" class="form-control"
                                                    placeholder="Enter Mobile Number">
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control"
                                                    placeholder="Enter Email Address">
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" class="form-control" placeholder="Enter Password">
                                            </div>
                                        </div>

                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea type="text" class="form-control" placeholder="Enter Address"></textarea>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <a class="btn btn btn-danger me-2"> Reset</a>
                                            <a class="btn btn btn-primary ">Submit</a>
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

    </div>
@endsection
