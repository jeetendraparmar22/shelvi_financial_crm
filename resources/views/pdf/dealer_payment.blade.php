<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Shelvi Financial Services</title>
    <style>
        @font-face {
            font-family: SourceSansPro;
            src: url(SourceSansPro-Regular.ttf);
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }



        header {
            padding: 5px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 70px;
        }

        #company {
            float: right;
            text-align: right;
        }


        #details {
            margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            float: right;
            text-align: right;
        }

        #invoice h1 {
            color: #0087C3;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0 0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 2px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td h3 {
            color: #57B223;
            font-size: 0.5em;
            font-weight: normal;
            margin: 0 0 0.1em 0;
        }

        table .no {
            color: #FFFFFF;
            font-size: 1.6em;
            background: #57B223;
        }

        table .desc {
            text-align: center;
        }

        table .unit {
            background: #DDDDDD;
        }

        table .qty {}

        table .total {
            background: #57B223;
            color: #FFFFFF;
        }

        table .unpaid {
            background: red;
            color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #57B223;
            font-size: 1.4em;
            border-top: 1px solid #57B223;

        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks {
            font-size: 2em;
            margin-bottom: 50px;
        }

        #notices {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="file://{{ public_path('assets/img/logo.png') }}" alt="Company Logo">
        </div>
        <div id="company">
            <div>Himmatnagar,Sabarkantha</div>
            <div>(+91) 98981 05656</div>
            <div><a href="mailto:jigarsuthar5656@gmail.com">jigarsuthar5656@gmail.com</a></div>
        </div>
        </div>
    </header>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                <div class="to">Dealer Name:</div>
                <h2 class="name">{{ $dealer_name }}</h2>
                <div class="address">({{ $from_date }} - {{ $to_date }})</div>
                {{-- <div class="email"><a href="mailto:john@example.com">john@example.com</a></div> --}}
            </div>

        </div>
        <table cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="no">#</th>
                    <th class="unit">Account Name</th>
                    <th class="unit">Loan Amount</th>
                    <th class="unit">IRR</th>
                    <th class="unit">Commission(%)</th>
                    <th class="unit">Commission amount</th>
                    <th class="unit">Status</th>


                </tr>
            </thead>
            <tbody>

                @foreach ($applications as $application)
                    <tr>
                        <td class="no">{{ $loop->iteration }}</td>
                        <td class="desc">{{ $application->first_name }}</td>
                        <td class="desc">{{ $application->loan_amount }}</td>
                        <td class="desc">{{ $application->interest_rate }}</td>
                        <td class="desc">{{ $application->commission }}</td>
                        <td class="desc">{{ $application->commission_amount }}</td>

                        @if ($application->commission_status == 1)
                            <td class="total">
                                Paid
                            </td>
                        @else
                            <td class="unpaid">
                                Unpaid
                            </td>
                        @endif


                    </tr>
                @endforeach


            </tbody>
            <tfoot>
                {{-- <tr>
                    <td colspan="2"></td>
                    <td colspan="2">SUBTOTAL</td>
                    <td>$5,200.00</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">TAX 25%</td>
                    <td>$1,300.00</td>
                </tr> --}}
                <tr>
                    <td colspan="3"></td>
                    <td colspan="3">TOTAL</td>
                    <td>{{ $grand_total }}-INR</td>
                </tr>
            </tfoot>
        </table>
        <div id="thanks">Thank you!</div>
        {{-- <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div> --}}
    </main>
    {{-- <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer> --}}
</body>

</html>
