@extends('layouts.master');
@section('main-container')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">File list of @isset($dealer_name)
                                    {{ $dealer_name }}
                                @endisset
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="wizard">
                                <form method="POST" action="{{ route('payload-data') }}">
                                    @csrf

                                    <div class="row align-items-end">
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Dealer Name</label>
                                                <select name="dealer" class="select">
                                                    <option value="">Select Dealer</option>
                                                    @foreach ($dealers as $dealer)
                                                        <option value="{{ $dealer->Dealer_name }}"
                                                            @isset($dealer_name)
            @if ($dealer->Dealer_name == $dealer_name) selected @endif
        @endisset>
                                                            {{ $dealer->Dealer_name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div
                                            class="col-lg-4
                                                            col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>Commission(%)</label>
                                                <select name="commission" class="form-control basic select">
                                                    <option value="">Select Rate</option>
                                                    @for ($i = 0; $i <= 3; $i += 0.25)
                                                        <option value="{{ number_format($i, 2) }}">
                                                            {{ number_format($i, 2) }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 col-sm-12">
                                            <button type="reset" class="btn btn-danger me-2">Reset</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>

                                </form>
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
                                    <h5 class="card-title"></h5>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group mb-0 me-3 ms-3">
                                        <a href="{{ route('generate-payload-pdf', ['dealer_name' => isset($dealer_name) ? $dealer_name : '', 'commission' => isset($commission) ? $commission : 0]) }}"
                                            class="btn btn-icon btn-primary" id="generate-payment-pdf" title="Generate PDF"
                                            target="_blank">
                                            <i class="fas fa-file-pdf"></i> Generate PDF
                                        </a>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-stripped table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Loan Amount</th>
                                            <th>IRR</th>
                                            <th>Commission(%)</th>
                                            <th>Commission Amount</th>
                                            <th>Payment status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dealer-payload-list ">
                                        @if (isset($applications))
                                            @foreach ($applications as $application)
                                                {{-- Count the commission amount --}}
                                                <?php
                                                $commission_amount = ($application->loan_amount * $commission) / 100;
                                                ?>

                                                <tr>
                                                    <td>{{ $application->first_name }} {{ $application->last_name }}</td>
                                                    <td>{{ $application->loan_amount }}</td>
                                                    <td>{{ $application->interest_rate }}</td>
                                                    <td>{{ $commission }}</td>
                                                    <td>{{ $commission_amount }}</td>
                                                    @if ($application->commission_status == 0)
                                                        <td>
                                                            <span class="badge bg-danger">Unpaid</span>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <span class="badge bg-success">Paid</span>

                                                        </td>
                                                    @endif

                                                </tr>
                                            @endforeach
                                        @endif


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

    </div>
@endsection
