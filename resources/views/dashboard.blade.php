@extends('layouts.master')
@section('main-container')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-1">
                                    <i class="fas fa-dollar-sign"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title"> Total Amount </div>
                                    <div class="dash-counts">
                                        <p>&#8377;{{ $sumApprovedLoansAmount }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-3">
                                <div class="progress-bar bg-5" role="progressbar" style="width: 75%" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            {{-- <p class="text-muted mt-3 mb-0">
                                <span class="text-danger me-1"><i class="fas fa-arrow-down me-1"></i>1.15%</span>
                                since last week
                            </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-2">
                                    <i class="fas fa-users"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title"> Total Executive</div>
                                    <div class="dash-counts">
                                        <p>{{ $totalExecutive }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-3">
                                <div class="progress-bar bg-6" role="progressbar" style="width: 65%" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            {{-- <p class="text-muted mt-3 mb-0">
                                <span class="text-success me-1"><i class="fas fa-arrow-up me-1"></i>2.37%</span>
                                since last week
                            </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-3">
                                    <i class="fas fa-file-alt"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title">Total Loan Application</div>
                                    <div class="dash-counts">
                                        <p>{{ $totalLoanApplication }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-3">
                                <div class="progress-bar bg-7" role="progressbar" style="width: 85%" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            {{-- <p class="text-muted mt-3 mb-0">
                                <span class="text-success me-1"><i class="fas fa-arrow-up me-1"></i>3.77%</span>
                                since last week
                            </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-4">
                                    <i class="far fa-file"></i>
                                </span>
                                <div class="dash-count">
                                    <div class="dash-title">Estimates</div>
                                    <div class="dash-counts">
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="progress progress-sm mt-3">
                                <div class="progress-bar bg-8" role="progressbar" style="width: 45%" aria-valuenow="75"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            {{-- <p class="text-muted mt-3 mb-0">
                                <span class="text-danger me-1"><i class="fas fa-arrow-down me-1"></i>8.68%</span>
                                since last week
                            </p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-7 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Loan Analytics</h5>
                                {{-- <div class="dropdown main">
                                    <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Monthly
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">Weekly</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">Monthly</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">Yearly</a>
                                        </li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between flex-wrap flex-md-nowrap">
                                <div class="w-md-100 d-flex align-items-center mb-3 flex-wrap flex-md-nowrap">
                                    <div>
                                        <span>Total Sales</span>
                                        <p class="h3 text-primary me-5">&#8377;{{ $sumApprovedLoansAmount }}</p>
                                    </div>
                                    {{-- <div>
                                        <span>Receipts</span>
                                        <p class="h3 text-success me-5">&#8377;0</p>
                                    </div>
                                    <div>
                                        <span>Expenses</span>
                                        <p class="h3 text-danger me-5">&#8377;0</p>
                                    </div>
                                    <div>
                                        <span>Earnings</span>
                                        <p class="h3 text-dark me-5">&#8377;0</p>
                                    </div> --}}
                                </div>
                            </div>
                            <div id="sales_chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Loan Application Analytics</h5>
                                {{-- <div class="dropdown main">
                                    <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Monthly
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">Weekly</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">Monthly</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">Yearly</a>
                                        </li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="invoice_chart"></div>
                            <div class="text-center text-muted">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="mt-4">
                                            <p class="mb-2 text-truncate">
                                                <i class="fas fa-circle text-primary me-1"></i>
                                                Total Recieved
                                            </p>
                                            <h5 id="total-application">0</h5>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mt-4">
                                            <p class="mb-2 text-truncate">
                                                <i class="fas fa-circle text-success me-1"></i>
                                                Approved
                                            </p>
                                            <h5 id="approved-application">0</h5>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mt-4">
                                            <p class="mb-2 text-truncate">
                                                <i class="fas fa-circle text-warning me-1"></i>
                                                Processing
                                            </p>
                                            <h5 id="processing-application">0</h5>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mt-4">
                                            <p class="mb-2 text-truncate">
                                                <i class="fas fa-circle text-danger me-1"></i>
                                                Rejected
                                            </p>
                                            <h5 id="rejected-application"></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-center">
                                <div class="col">
                                    <h5 class="card-title">Recent Add Loan application</h5>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('customers.index') }}"
                                        class="btn-right btn btn-sm btn-outline-primary">
                                        View All
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="progress progress-md rounded-pill mb-3">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 47%"
                                        aria-valuenow="47" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 28%"
                                        aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 15%"
                                        aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 10%"
                                        aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="row">
                                    <div class="col-auto">
                                        <i class="fas fa-circle text-success me-1"></i> Approved
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-circle text-warning me-1"></i> Processing
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-circle text-danger me-1"></i> Rejected
                                    </div>
                                    {{-- <div class="col-auto">
                                        <i class="fas fa-circle text-info me-1"></i> Draft
                                    </div> --}}
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-stripped table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Customer Name</th>
                                            <th> Loan Amount</th>
                                            <th>Finance Name</th>
                                            <th> Loan Status</th>
                                            <th> User Name</th>
                                            <th>Executive Name</th>
                                            {{-- <th class="text-right">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customers as $customer)
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a
                                                            href="{{ route('customers.show', ['customer' => $customer->id]) }}">{{ $customer->first_name }}</a>
                                                    </h2>
                                                </td>
                                                <td>&#8377;{{ $customer->loan_amount }}</td>
                                                <td>{{ $customer->finance_name }}</td>
                                                {{-- <td>
                                                    <span
                                                        class="badge bg-success-light">{{ $customer->loan_status }}</span>
                                                </td> --}}

                                                @if ($customer->loan_status == 'Approved')
                                                    <td>
                                                        <span class="badge bg-success">{{ $customer->loan_status }}</span>
                                                    </td>
                                                @elseif ($customer->loan_status == 'Processing')
                                                    <td>
                                                        <span class="badge bg-warning">{{ $customer->loan_status }}</span>
                                                    </td>
                                                @else
                                                    <td>
                                                        <span class="badge bg-danger">{{ $customer->loan_status }}</span>
                                                    </td>
                                                @endif
                                                <td>
                                                    {{ $customer->user_name }}
                                                </td>
                                                <td>
                                                    {{ $customer->executive_name }}
                                                </td>
                                                {{-- <td class="text-right">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                class="fas fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="edit-invoice.html"><i
                                                                    class="far fa-edit me-2"></i>Edit</a>
                                                            <a class="dropdown-item" href="invoice-details.html"><i
                                                                    class="far fa-eye me-2"></i>View</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="far fa-trash-alt me-2"></i>Delete</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="far fa-check-circle me-2"></i>Mark
                                                                as sent</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="far fa-paper-plane me-2"></i>Send
                                                                Invoice</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="far fa-copy me-2"></i>Clone
                                                                Invoice</a>
                                                        </div>
                                                    </div>
                                                </td> --}}
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
    <script>
        // function loanAnalyticData() {
        //     const formData = new FormData();

        //     axios
        //         .get("/loan-analytic-data", formData)
        //         .then((response) => {

        //             console.log(response.data)
        //             columnChart.updateSeries([{
        //                     name: 'Received',
        //                     type: "column",
        //                     data: response.data.recieved
        //                 }

        //             ]);
        //         })
        //         .catch((error) => {
        //             console.error(error);
        //         });
        // }
        // loanAnalyticData();

        "use strict";

        $(document).ready(function() {
            // Function to fetch data from Laravel API
            function fetchData(url, callback) {
                axios.get(url)
                    .then(function(response) {
                        if (response.data) {
                            callback(response.data);
                        } else {
                            console.error('Empty response from API');
                        }
                    })
                    .catch(function(error) {
                        console.error('Error fetching data:', error);
                    });
            }

            // Function to generate data for the charts
            function generateData(baseval, count, yrange) {
                var i = 0;
                var series = [];
                while (i < count) {
                    var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;
                    var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
                    var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;

                    series.push([x, y, z]);
                    baseval += 86400000;
                    i++;
                }
                return series;
            }

            // Column chart
            if ($("#sales_chart").length > 0) {
                var columnCtx = document.getElementById("sales_chart");

                // Fetch data from Laravel API for the column chart
                fetchData('/loan-analytic-data', function(data) {
                    var columnConfig = {
                        colors: ["#7638ff", "#fda600"],
                        series: [{
                                name: "Received",
                                type: "column",
                                data: data,
                            },
                            {
                                name: "Pending",
                                type: "column",
                                // data: ,
                            },
                        ],
                        chart: {
                            type: "bar",
                            fontFamily: "Poppins, sans-serif",
                            height: 350,
                            toolbar: {
                                show: false,
                            },
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: "60%",
                                endingShape: "rounded",
                            },
                        },
                        dataLabels: {
                            enabled: false,
                        },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ["transparent"],
                        },
                        xaxis: {
                            categories: [
                                "Jan",
                                "Feb",
                                "Mar",
                                "Apr",
                                "May",
                                "Jun",
                                "Jul",
                                "Aug",
                                "Sep",
                                "Oct",
                                "Nov",
                                "Dec",
                            ],
                        },
                        yaxis: {
                            title: {
                                text: "₹",
                            },
                        },
                        fill: {
                            opacity: 1,
                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return "₹ " + val;
                                },
                            },
                        },
                    };

                    var columnChart = new ApexCharts(columnCtx, columnConfig);
                    columnChart.render();
                });
            }

            // Continue the same approach for other charts...
        });
    </script>
@endsection
