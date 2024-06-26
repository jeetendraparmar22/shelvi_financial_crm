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
                                    <a href="#" class="text-muted">Customers Loan Application List</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Applications List
                            </h4>
                            <div>
                                <h4 id="total-loan-amount">1</h4>
                            </div>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card-body pt-2 ps-1 pe-1">
                            <div>
                                <div class="d-flex align-items-center">
                                    @if (auth()->user()->user_type == 'admin')
                                        {{-- <div class="user_list form-group mb-0">
                                            <select class="select" id="user_list">
                                                <option>Select User</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>



                                        </div> --}}
                                    @endif
                                    <div class="top-nav-search customer_list">

                                        <div class>
                                            <a class="btn btn-primary" href="{{ route('customers.create') }}"><i
                                                    class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add New
                                                Application</a>
                                        </div>
                                        <div class="form-group mb-0 me-3 ms-3">
                                            <form method="POST" action="{{ url('search-customer') }}">
                                                @csrf
                                                <select class="select basic" name="month">
                                                    <option value="">Select Month</option>
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>r</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">August</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>

                                                </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Search</button>
                                        </form>

                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <table class="table table-center table-hover datatable dataTable no-footer"
                                            id="customer-list-datatable" role="grid"
                                            aria-describedby="DataTables_Table_0_info">
                                            <thead class="thead-light">
                                                <tr role="row">
                                                    <th class="sorting" rowspan="1" colspan="1">#</th>
                                                    <th class="sorting" rowspan="1" colspan="1">Customer Name</th>
                                                    <th class="sorting" rowspan="1" colspan="1">Loan Amount</th>
                                                    <th class="sorting" rowspan="1" colspan="1"> Finance Name</th>

                                                    <th class="sorting" rowspan="1" colspan="1">Vehicle No.</th>

                                                    <th class="sorting">Executive Name</th>
                                                    <th class="sorting" rowspan="1" colspan="1">Dealer Name</th>

                                                    <th class="sorting text-center" rowspan="1" colspan="1">Documents
                                                    </th>
                                                    <th class="sorting" rowspan="1" colspan="1">File Login Date</th>
                                                    <th class="sorting_asc" rowspan="1" colspan="1"
                                                        aria-sort="ascending">Loan Status</th>
                                                    <th class="sorting" rowspan="1" colspan="1">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($customers as $customer)
                                                    <tr role="row" class="odd">
                                                        <td class>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a
                                                                    href="{{ route('customers.show', ['customer' => $customer->id]) }}">{{ $customer->first_name }}
                                                                </a>
                                                            </h2>
                                                        </td>
                                                        <td class="loanAmount">{{ $customer->loan_amount }}</td>
                                                        <td>{{ $customer->finance_name }}</td>

                                                        <td>{{ $customer->vehicle_registration_no }}</td>
                                                        <td>{{ $customer->executive_name }}</td>
                                                        <td>{{ $customer->Dealer_name }}</td>


                                                        <td class="ver_middle text-center">

                                                            <div class="d-flex justify-content-center">
                                                                @php
                                                                    $path = parse_url(
                                                                        $customer->adhar_card,
                                                                        PHP_URL_PATH,
                                                                    ); // Get the path from the URL
                                                                    // Get the filename without extension
                                                                    $fileExtension = pathinfo(
                                                                        $path,
                                                                        PATHINFO_EXTENSION,
                                                                    ); // Get the file extension

                                                                @endphp
                                                                @if ($fileExtension === 'pdf')
                                                                    <a href="{{ asset('storage/' . $customer->adhar_card) }}"
                                                                        target="_blank">
                                                                        <img src="{{ asset('assets/img/icons/pdf-icon.png') }}"
                                                                            alt="PDF Icon" class="doc_icons">
                                                                    </a>
                                                                @elseif ($customer->adhar_card == '')
                                                                @else
                                                                    <a href="#">
                                                                        <img data-fancybox
                                                                            src="{{ asset('storage/' . $customer->adhar_card) }}"
                                                                            class="doc_icons" /></a>
                                                                @endif


                                                                @php
                                                                    $path = parse_url($customer->rc_book, PHP_URL_PATH); // Get the path from the URL
                                                                    // Get the filename without extension
                                                                    $fileExtension = pathinfo(
                                                                        $path,
                                                                        PATHINFO_EXTENSION,
                                                                    ); // Get the file extension

                                                                @endphp
                                                                @if ($fileExtension === 'pdf')
                                                                    <a href="{{ asset('storage/' . $customer->rc_book) }}"
                                                                        target="_blank">
                                                                        <img src="{{ asset('assets/img/icons/pdf-icon.png') }}"
                                                                            alt="PDF Icon" class="doc_icons">
                                                                    </a>
                                                                @elseif ($customer->rc_book == '')
                                                                @else
                                                                    <a href="#">
                                                                        <img data-fancybox
                                                                            src="{{ asset('storage/' . $customer->rc_book) }}"
                                                                            class="doc_icons" /></a>
                                                                @endif
                                                                @php
                                                                    $path = parse_url(
                                                                        $customer->insurance_file,
                                                                        PHP_URL_PATH,
                                                                    ); // Get the path from the URL
                                                                    // Get the filename without extension
                                                                    $fileExtension = pathinfo(
                                                                        $path,
                                                                        PATHINFO_EXTENSION,
                                                                    ); // Get the file extension

                                                                @endphp
                                                                @if ($fileExtension === 'pdf')
                                                                    <a href="{{ asset('storage/' . $customer->insurance_file) }}"
                                                                        target="_blank">
                                                                        <img src="{{ asset('assets/img/icons/pdf-icon.png') }}"
                                                                            alt="PDF Icon" class="doc_icons">
                                                                    </a>
                                                                @elseif ($customer->insurance_file == '')
                                                                @else
                                                                    <a href="#">
                                                                        <img data-fancybox
                                                                            src="{{ asset('storage/' . $customer->insurance_file) }}"
                                                                            class="doc_icons" /></a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td>{{ $customer->file_log_in_date }}</td>
                                                        @if ($customer->loan_status == 'Approved')
                                                            <td class="sorting_1"><span
                                                                    class="badge badge-pill bg-success"
                                                                    id="loan-status-class">{{ $customer->loan_status }}</span>
                                                            </td>
                                                        @elseif ($customer->loan_status == 'Processing')
                                                            <td class="sorting_1"><span
                                                                    class="badge badge-pill bg-warning"
                                                                    id="loan-status-class">{{ $customer->loan_status }}</span>
                                                            </td>
                                                        @else
                                                            <td class="sorting_1"><span class="badge badge-pill bg-danger"
                                                                    id="loan-status-class">{{ $customer->loan_status }}</span>
                                                            </td>
                                                        @endif

                                                        <td class="d-flex align-items-center">
                                                            @if ($customer->transfer_status == '0' && $customer->loan_status == 'Approved')
                                                                <a class="btn btn-small btn-warning  me-2"
                                                                    href="{{ url('update-transfer-status/' . $customer->id) }}"><i
                                                                        class="far fa-edit me-2"></i>Transfer</a>
                                                            @elseif($customer->transfer_status == '1')
                                                                <a class="btn btn-small btn-warning  me-2"
                                                                    href=""><i
                                                                        class="far fa-edit me-2"></i>Transferred</a>
                                                            @endif

                                                            <a class="btn btn-small btn-success  me-2"
                                                                href="{{ route('customers.edit', $customer->id) }}"><i
                                                                    class="far fa-edit me-2"></i> Edit</a>
                                                            <form method="POST"
                                                                action="{{ route('customers.destroy', $customer->id) }}"
                                                                id="customer-delete-form-{{ $customer->id }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a class="btn btn-small btn-danger text-white"
                                                                    onclick="confirmDelete({{ $customer->id }})"><i
                                                                        class="far fa-trash-alt me-2"></i>Delete</a>
                                                            </form>
                                                        </td>
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
    <script>
        // $(document).ready(function() {
        //     // Initialize DataTable
        //     const dataTable = $('#customer-list-datatable').DataTable();

        //     // Calculate total loan amount
        //     calculateTotal();

        //     // Event listener for search input
        //     $('#searchInput').on('keyup', function() {
        //         dataTable.search(this.value).draw();
        //         calculateTotal();
        //     });

        //     function calculateTotal() {
        //         let total = 0;

        //         // Iterate through each row and add the loan amount to the total
        //         $('.loanAmount').each(function() {
        //             total += parseFloat($(this).text()) || 0;
        //         });

        //         // Display the total in the console or any other desired location
        //         console.log('Total Loan Amount: ' + total);
        //     }
        // })
        $(document).ready(function() {
            // Initialize DataTable with search functionality
            const dataTable = $('#customer-list-datatable').DataTable();

            // Calculate and display total loan amount on initial load
            calculateAndDisplayTotal();

            // Add an event listener for the search input
            $('input[type="search"]').on('keyup', function() {
                // Recalculate and display total loan amount on search
                calculateAndDisplayTotal();
            });

            function calculateAndDisplayTotal() {
                let total = 0;

                // Iterate through each row and add the loan amount to the total
                $('.loanAmount').each(function() {
                    total += parseFloat($(this).text()) || 0;
                });

                // Display the total in the console or any other desired location

                $('#total-loan-amount').text('Total Loan Amount: ' + total);
            }
        });
    </script>
@endsection
