@extends('layouts.master');
@section('main-container')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Payload
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="wizard">

                                <div class="row align-items-end">
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Dealer Name</label>
                                            <select name="dealer" id="dealer" class="select">
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

                                    <div class="col-lg-2 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Excetuvie name</label>
                                            <select name="executive" id="executive" class="select">
                                                <option value="">Select Executive</option>
                                                @foreach ($executives as $executive)
                                                    <option value="{{ $executive->executive_name }}">
                                                        {{ $executive->executive_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>From Date</label>
                                            <input type="text" name="from_date" id="from_date"
                                                class="datetimepicker form-control" placeholder="Select From Date">
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>To Date</label>
                                            <input type="text" name="to_date" id="to_date"
                                                class="datetimepicker form-control" placeholder="Select To Date">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-4 col-sm-12">

                                        <button type="submit" class="btn btn-primary" style="margin-top:-63px;"
                                            id="fetch-dealer-data">Submit</button>
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
                                <tbody id="dealer-payload-list">
                                    <tr>
                                        <td colspan="6" class="text-center">No data available</td>
                                    </tr>

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
            $(document).on('change', '.commission-select', function() {
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

            // Set customer data in table
            $(document).on('click', '#fetch-dealer-data', function(e) {
                e.preventDefault();
                const dealer = $('#dealer').val();
                const fromDate = $('#from_date').val();
                const toDate = $('#to_date').val();
                const executive = $('#executive').val();

                axios.post("{{ route('payload-data') }}", {
                        dealer: dealer,
                        from_date: fromDate,
                        to_date: toDate,
                        executive_name: executive
                    })
                    .then(function(response) {
                        const data = response.data.data;
                        const tableBody = $('#dealer-payload-list');
                        tableBody.html("");

                        if (data.length > 0) {

                            data.forEach(application => {

                                var commissionAmount = (application.loan_amount * application
                                    .commission) / 100;
                                var statusBadge = application.commission_status == 0 ?
                                    `<span class="badge bg-danger">Unpaid</span>
                           <button class="btn btn-sm btn-success mark-status-btn" 
                               data-application-id="${application.id}" data-status="1">Mark as Paid</button>` :
                                    `<span class="badge bg-success">Paid</span>
                           <button class="btn btn-sm btn-danger mark-status-btn" 
                               data-application-id="${application.id}" data-status="0">Mark as Unpaid</button>`;

                                var row = `<tr>
                        <td>${application.first_name} ${application.last_name}</td>
                        <td>${application.loan_amount}</td>
                        <td>${application.interest_rate}</td>
                        <td>
                            <select name="commission[]" class="select commission-select" 
                                data-application-id="${application.id}" data-loan-amount="${application.loan_amount}">
                                ${generateCommissionOptions(application.commission)}
                            </select>
                        </td>
                        <td class="commission-amount">${commissionAmount.toFixed(2)}</td>
                        <td>${statusBadge}</td>
                    </tr>`;

                                tableBody.append(row);
                            });

                            $('.select').select2();
                        } else {
                            tableBody.html(
                                '<tr><td colspan="6" class="text-center">No data available</td></tr>'
                            );
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                        alert("unable to fetch data");
                    });
            });

        });

        function generateCommissionOptions(selectedValue) {
            let options = "";
            for (let i = 0; i <= 3; i += 0.25) {
                let value = i.toFixed(2);
                options += `<option value="${value}" ${value == selectedValue ? 'selected' : ''}>${value}</option>`;
            }
            return options;
        }

        $('#generate-payment-pdf').on('click', function(event) {
            event.preventDefault(); // Prevent default click action

            // Get values from date pickers
            const fromDate = $('#from_date').val();
            const toDate = $('#to_date').val();
            const dealerName = $('#dealer').val();
            const excutiveName = $('#executive').val();
            if (!fromDate || !toDate || !dealerName) {
                toastr.error('Please select a date range and a dealer.');
                return;
            }
            // Construct the new URL with parameters
            let pdfUrl = "{{ route('generate-payload-pdf') }}";
            pdfUrl += `?dealer_name=${encodeURIComponent(dealerName)}`;
            pdfUrl +=
                `&from_date=${encodeURIComponent(fromDate)}&to_date=${encodeURIComponent(toDate)}&executive_name=${encodeURIComponent(excutiveName)}`;

            // Open the generated URL in a new tab
            window.open(pdfUrl, '_blank');
        });
    </script>
@endsection
