@extends('layouts.master')
@section('main-container')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="rounded p-3">
                            <ol class="breadcrumb breadcrumb-dot text-muted mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item text-muted">
                                    <a href="#" class="text-muted">Export To CSV</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card-body pt-2 ps-1 pe-1">
                            <div>

                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper_extra"
                                        class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <table class="table table-center table-hover datatable dataTable no-footer"
                                            id="customer-list-datatable_extra" role="grid"
                                            aria-describedby="DataTables_Table_0_info">
                                            <thead class="thead-light">
                                                <tr role="row">

                                                    <th class="sorting" rowspan="1" colspan="1">Approve
                                                        Date</th>
                                                    <th class="sorting" rowspan="1" colspan="1">Account Name</th>
                                                    <th class="sorting" rowspan="1" colspan="1"> Engine No </th>

                                                    <th class="sorting" rowspan="1" colspan="1">Chasis No </th>

                                                    <th class="sorting">Reg No</th>
                                                    <th class="sorting" rowspan="1" colspan="1">Loan
                                                        Amount</th>

                                                    <th class="sorting text-center" rowspan="1" colspan="1">Source By
                                                    </th>
                                                    <th class="sorting" rowspan="1" colspan="1">Area</th>
                                                    <th class="sorting_asc" rowspan="1" colspan="1"
                                                        aria-sort="ascending">Due
                                                        Days</th>
                                                    <th class="sorting" rowspan="1" colspan="1">Dealer
                                                        Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($customers as $customer)
                                                    <tr role="row" class="odd">
                                                        <td class>{{ $customer->approved_date }}</td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a
                                                                    href="{{ route('customers.show', ['customer' => $customer->id]) }}">{{ $customer->first_name }}
                                                                </a>
                                                            </h2>
                                                        </td>
                                                        {{-- <td class="loanAmount"></td> --}}
                                                        <td>{{ $customer->engine_no }}</td>

                                                        <td>{{ $customer->chasis_no }}</td>
                                                        <td>{{ $customer->vehicle_registration_no }}</td>
                                                        <td>{{ $customer->loan_amount }}</td>

                                                        <td>{{ $customer->user_id }}</td>
                                                        <td>{{ $customer->city }}</td>
                                                        <td>Days</td>
                                                        <td>{{ $customer->Dealer_name }}</td>



                                                    </tr>
                                                @endforeach

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
                                        class="w-100 btn btn-primary paid-continue-btn">Save Changes</button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" data-bs-dismiss="modal"
                                        class="w-100 btn btn-primary paid-cancel-btn">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal custom-modal fade" id="delete_modal" role="dialog">
            < <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Users</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">

                                    <button href="#" class="btn btn-primary paid-continue-btn">Delete</button>

                                </div>
                                <div class="col-6">
                                    <a href="#" data-bs-dismiss="modal"
                                        class="btn btn-primary paid-cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>
    <script></script>
@endsection
