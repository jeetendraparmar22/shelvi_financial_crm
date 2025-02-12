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
                                        <div class="col-lg-3 col-md-4 col-sm-12">
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

                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>From Date</label>
                                                <input type="text" name="from_date" class="datetimepicker form-control"
                                                    placeholder="Select From Date">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label>To Date</label>
                                                <input type="text" name="to_date" class="datetimepicker form-control"
                                                    placeholder="Select To Date">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-4 col-sm-12">

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
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
                                    <a href="{{ route('generate-payload-pdf', ['dealer_name' => isset($dealer_name) ? $dealer_name : '']) }}"
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
                                            $commission_amount = ($application->loan_amount * $application->commission) / 100;
                                            ?>

                                            <tr>
                                                <td>{{ $application->first_name }} {{ $application->last_name }}</td>
                                                <td>{{ $application->loan_amount }}</td>
                                                <td>{{ $application->interest_rate }}</td>
                                                <td>
                                                    <select name="commission[]" class="select commission-select"
                                                        data-application-id="{{ $application->id }}"
                                                        data-loan-amount="{{ $application->loan_amount }}">

                                                        @for ($i = 0; $i <= 3; $i += 0.25)
                                                            <option value="{{ number_format($i, 2) }}"
                                                                @if (number_format($i, 2) == $application->commission) selected @endif>
                                                                {{ number_format($i, 2) }}
                                                            </option>
                                                        @endfor
                                                    </select>

                                                </td>
                                                <td class="commission-amount">{{ number_format($commission_amount, 2) }}
                                                </td>
                                                @if ($application->commission_status == 0)
                                                    <td>
                                                        <span class="badge bg-danger">Unpaid</span>
                                                        <button type="button"
                                                            class="btn btn-sm btn-success mark-status-btn"
                                                            data-application-id="{{ $application->id }}"
                                                            data-status="1">Mark as Paid</button>
                                                    </td>
                                                @else
                                                    <td>
                                                        <span class="badge bg-success">Paid</span>
                                                        <button type="button" class="btn btn-sm btn-danger mark-status-btn"
                                                            data-application-id="{{ $application->id }}"
                                                            data-status="0">Mark as Unpaid</button>
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

    <script>
        $(document).ready(function() {
            $('.commission-select').on('change', function() {
                var applicationId = $(this).data('application-id');
                var commission = $(this).val();
                var loanAmount = parseFloat($(this).data('loan-amount'));
                var $commissionAmountCell = $(this).closest('tr').find('.commission-amount');

                // Calculate the commission amount
                let commissionAmount = (loanAmount * commission) / 100;
                $commissionAmountCell.text(commissionAmount.toFixed(2));

                axios.post('{{ route('update-commission') }}', {
                    application_id: applicationId,
                    commission: commission
                }).then(function(response) {
                    alert(response.data.message);
                }).catch(function(error) {
                    console.log(error);
                }).then(function() {

                })
            });

            // update payment status
            $(document).on('click', '.mark-status-btn', function(event) {
                event.preventDefault();

                var applicationId = $(this).data('application-id');
                var status = $(this).data('status');
                var $button = $(this);

                axios.post('{{ route('update-payment-status') }}', {
                    application_id: applicationId,
                    status: status
                }).then(function(response) {

                    if (response.data.success) {
                        // Update the UI based on the new status
                        if (status == 1) {
                            $button.closest('td').html(`
                    <span class="badge bg-success">Paid</span>
                    <button type="button" class="btn btn-sm btn-danger mark-status-btn" 
                            data-application-id="${applicationId}" data-status="0">Mark as Unpaid</button>
                `);
                        } else {
                            $button.closest('td').html(`
                    <span class="badge bg-danger">Unpaid</span>
                    <button type="button" class="btn btn-sm btn-success mark-status-btn" 
                            data-application-id="${applicationId}" data-status="1">Mark as Paid</button>
                `);
                        }
                    } else {
                        alert('Failed to update status.');
                    }
                }).catch(function(error) {
                    console.error(error);

                }).finally(function() {


                })
            });
        });
    </script>

@endsection
