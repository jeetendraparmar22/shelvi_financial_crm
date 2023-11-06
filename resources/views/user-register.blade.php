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
                                <form method="POST" action="{{ route('users.store') }}">
                                    @csrf
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" name="name" value="{{ old('name') }}"
                                                    class="form-control" placeholder="Enter Full Name">
                                            </div>
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <input type="number" class="form-control" placeholder="Enter Mobile Number"
                                                    name="mobile_no" value="{{ old('mobile_no') }}">
                                            </div>
                                            @error('mobile_no')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" value="{{ old('email') }}"
                                                    class="form-control" placeholder="Enter Email Address">
                                            </div>
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Enter Password">
                                            </div>
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>User Type</label>
                                                <select name="user_type" class="basic select">
                                                    <option value="user" selected>Executive</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea type="text" name="address" class="form-control" placeholder="Enter Address">{{ old('address') }}</textarea>
                                            </div>
                                        </div>
                                       

                                        <div class="d-flex justify-content-center">
                                            <button type="reset" class="btn btn btn-danger me-2"> Reset</button>
                                            <button type="submit" class="btn btn btn-primary ">Submit</button>
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
