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
                                    <h5 class="mb-1">John Doe</h5>
                                    <h6 class="text-muted mb-0">UI/UX Designer</h6>
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
                                        <small>demo@sample.com</small>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="media align-items-center">
                                        <i class="fa fa-phone f-20"></i>
                                        <div class="media-body mx-3">
                                            <h6 class="m-0">Phone</h6>
                                        </div>
                                        <small>(+99) 9999 999 999</small>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="media align-items-center">
                                        <i class="fa fa-location f-20"></i>
                                        <div class="media-body mx-3">
                                            <h6 class="m-0">Location</h6>
                                        </div>
                                        <small>Melbourne</small>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 col-xxl-9">
                    <div class="card border">
                        <div class="card-header">
                            <h5>About me</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-4">Hello,I’m Anshan Handgun Creative Graphic Designer &amp; User Experience
                                Designer based in Website, I create
                                digital Products a more Beautiful and usable place. Morbid accusant ipsum. Nam nec tellus
                                at.</p>
                            <h5>Personal Details</h5>
                            <hr class="my-3">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><b class="text-header">Full Name</b></td>
                                            <td>:</td>
                                            <td>John Doe</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Fathers Name</b></td>
                                            <td>:</td>
                                            <td>Mr. Deepen Handgun</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Address</b></td>
                                            <td>:</td>
                                            <td>Street 110-B Kalians Bag, Dewan, M.P. INDIA</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Zip Code</b></td>
                                            <td>:</td>
                                            <td>12345</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Phone</b></td>
                                            <td>:</td>
                                            <td>+0 123456789 , +0 123456789</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Email</b></td>
                                            <td>:</td>
                                            <td>support@example.com</td>
                                        </tr>
                                        <tr>
                                            <td><b class="text-header">Website</b></td>
                                            <td>:</td>
                                            <td>http://example.com</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card border">
                        <div class="card-header">
                            <h5>Education</h5>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center mb-3">
                                <div class="col-sm-3">
                                    <h5>2014-2017</h5><span>Master Degree</span>
                                </div>
                                <div class="col-sm-9">
                                    <h6>Master Degree in Computer Application</h6>
                                    <p>University of Oxford, England</p>
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col-sm-3">
                                    <h5>2011-2013</h5><span>Bachelor</span>
                                </div>
                                <div class="col-sm-9">
                                    <h6>Bachelor Degree in Computer Engineering</h6>
                                    <p>Imperial College London</p>
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col-sm-3">
                                    <h5>2009-2011</h5><span>School</span>
                                </div>
                                <div class="col-sm-9">
                                    <h6>Higher Secondary Education</h6>
                                    <p>School of London, England</p>
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
