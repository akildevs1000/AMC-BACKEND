<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Service Report</title>
    <style>
        * {
            padding: 0px;
            margin: 0;
            font-family: "Open Sans", sans-serif;
            font-size: 9pt;
            color: #777777;
        }

        body {
            margin: 25px 25px 0 25px;
        }

        .pa-1 {
            padding: 5px !important;
        }

        .pa-2 {
            padding: 10px !important;
        }

        .pa-3 {
            padding: 15px !important;
        }

        .pa-4 {
            padding: 20px !important;
        }

        .pa-5 {
            padding: 25px !important;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
        }

        .text-left {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .logo {
            max-width: 150px;
            height: auto;
        }

        .heading-bg {
            background: #9e9e9e;
        }

        .text-white {
            color: #fff;
        }

        .red {
            background-color: red;
        }

        .green {
            background-color: green;
        }

        .blue {
            background-color: blue;
        }

        .col-1 {
            width: 8.3%;
        }

        .col-2 {
            width: 16.6%;
        }

        .col-3 {
            width: 24.9%;
        }

        .col-4 {
            width: 33.2%;
        }

        .col-5 {
            width: 49.5%;
        }

        .col-6 {
            width: 50%;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .border {
            border: 1px solid #dddddd;
        }

        .border-top {
            border-top: 1px solid #dddddd;
            /* Add top border */
        }

        .border-bottom {
            border-bottom: 1px solid #dddddd;
            /* Add top border */
        }

        .border-none {
            border: none;
            /* Add top border */
        }

        .mt-1 {
            margin-top: 5px;
            /* Add top border */
        }

        .mt-2 {
            margin-top: 10px;
            /* Add top border */
        }

        .mt-3 {
            margin-top: 15px;
            /* Add top border */
        }

        .mt-4 {
            margin-top: 20px;
            /* Add top border */
        }

        .mt-5 {
            margin-top: 25px;
            /* Add top border */
        }

        .mx-5 {
            margin-left: 5px;
            margin-right: 5px;
        }

        .ml-15 {
            padding-left: 15px;
        }

        .mr-15 {
            padding-right: 15px;
        }

        .empty-box {
            min-height: 10px;
            background: red
        }

        .page-break {
            page-break-after: always;
        }

        footer {
            position: fixed;
            right: 0px;
            bottom: 10px;
            text-align: center;
            counter-reset: pageTotal;
            width: 100%;

        }

        .circle-container {
            text-align: left;
        }

        .circle-container img {
            border-radius: 50%;
            max-width: 100%;
            vertical-align: middle;
            /* Adjust as needed for spacing */
        }

        footer .page:before {
            content: counter(page, decimal);
        }

        footer .page:after {
            counter-increment: counter(page, decimal);
        }

        .pageCounter span {
            counter-increment: pageTotal;
        }

        #pageNumbers span:before {
            counter-increment: currentPage;
            content: "Page " counter(currentPage) "/";
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td class="text-left border-none col-4">
                <div class="logo pt">
                    <img style="width: 100%" src="https://amc.mytime2cloud.com/mail-logo.png" alt="Company Logo" />
                </div>
            </td>
            <td class="text-center border-none col-4 uppercase">

            </td>
            <td class="text-right border-none col-4">
                <div class="company-info">
                    <h3>AKIL SECURITY AND ALARM SYSTEMS</h3>
                    <p>DUBAI - UNITED ARAB EMIRATES</p>
                    <p>+971 4 3939 562, INFO@AKILGROUP.COM</p>
                </div>
            </td>
        </tr>
    </table>

    <table class="mt-2">
        <tr>
            <td class="col-4 border-none"></td>
        </tr>
        <tr>
            <td class="text-center border-none col-4 uppercase">
                <div class="border-top border-bottom pa-2">
                    <b>SERVICE REPORT</b>
                </div>
            </td>
        </tr>
        <tr>
            <td class="col-4 border-none"></td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="col-4 border-none">
                <div class="border-top border-bottom">
                    Date: {{ $item['date'] }}
                </div>

            </td>
            <td class="border-none col-4 uppercase">
                <div class="border-top border-bottom">
                    AMC Agreement Number:<b>{{ $item['ticket']['company']['contract']['id'] }}</b>
                </div>
            </td>
            <td class="border-none col-4 uppercase">
                <div class="border-top border-bottom">
                    Ticket Number: {{ $item['id'] }}
                </div>
            </td>
        </tr>
    </table>

    <div class="section-1">
        <table class="mt-2">
            <tr class="heading-bg ">
                <td class="col-4 border-none">
                    <div class="border-top border-bottom pa-1">
                        <b class="text-white">Customer</b>
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Company Name: <b>{{ $item['ticket']['company']['name'] }}</b>
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        License Issuer: <b>{{ $item['ticket']['company']['trade_license']['issued_by'] }}</b>
                    </div>
                </td>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        License Number: <b>{{ $item['ticket']['company']['trade_license']['license_no'] }}</b>
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Address: <b>{{ $item['ticket']['company']['address'] }}</b>
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        LPO Number: <b></b>
                    </div>
                </td>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        AMC Since: <b>{{ $item['ticket']['company']['contract']['show_start_date'] }}</b>
                    </div>
                </td>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        AMC Expire: <b>{{ $item['ticket']['company']['contract']['show_expire_date'] }}</b>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="section-2">
        <table class="mt-2">
            <tr class="heading-bg ">
                <td class="col-4 border-none">
                    <div class="border-top border-bottom pa-1">
                        <b class="text-white">Customer Complain</b>
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Reported By:
                        <b>{{ $item['ticket']['company']['contact']['name'] }},{{ $item['ticket']['company']['contact']['position'] }}</b>
                    </div>
                </td>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Reported Date: <b>{{ $item['ticket']['ticket_open_date_time'] }}</b>
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Product Category: <b>{{ $item['equipment_category']['name'] }}</b>
                    </div>
                </td>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Problem: <b></b>
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Description: <b>{{ $item['ticket']['description'] }}</b>
                    </div>
                </td>
            </tr>
            @foreach (range(1, 3) as $i)
                <tr>
                    <td class="col-4 border-none ">
                        <div class="border-bottom pa-2">
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="section-3">
        <table class="mt-2">
            <tr class="heading-bg ">
                <td class="col-4 border-none">
                    <div class="border-top border-bottom pa-2">
                        <b class="text-white">Engineer Report</b>
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Actual Problem: <b>{{ $item['actual_problem'] }}</b>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Action Taken: <b>{{ $item['action_taken'] }}</b>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Description: {{ $item['description'] }}
                    </div>
                </td>
            </tr>
            @foreach (range(1, 3) as $i)
                <tr>
                    <td class="col-4 border-none ">
                        <div class="border-bottom pa-2">
                        </div>
                    </td>
                </tr>
            @endforeach


        </table>
        <table>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Ticket Status: <b>{{ $item['ticket']['status'] }}</b>
                    </div>
                </td>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Date: <b>{{ $item['ticket']['ticket_close_date_time'] }}</b>
                    </div>
                </td>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Engineer Name : <b>{{ $item['technician']['name'] }}</b>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="section-3">
        <table class="mt-2">
            <tr class="heading-bg ">
                <td class="col-4 border-none">
                    <div class="border-top border-bottom pa-1">
                        <b class="text-white">Engineer Observations & Comments</b>
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        <ul class="pa-2">
                            @foreach (explode("\r\n", $item['summary']) as $t)
                                <li>{{ $t }}</li>
                            @endforeach

                        </ul>
                    </div>
                </td>
            </tr>
            @foreach (range(1, 4) as $i)
                <tr>
                    <td class="col-4 border-none ">
                        <div class="border-bottom pa-2">
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="section-4">
        <table class="mt-2">
            <tr class="heading-bg ">
                <td class="col-4 border-none">
                    <div class="border-top border-bottom pa-1">
                        <b class="text-white">Acknowledge</b>
                    </div>
                </td>
            </tr>
        </table>
        <table>

            <tr>
                <td class="border-none ">
                    <div class="border-bottom pa-1 mr-15">
                        Engineer
                    </div>
                </td>
                <td class="border-none">
                    <div class="border-bottom pa-1 ml-15">
                        Customer
                    </div>
                </td>
            </tr>
            <tr>
                <td class="border-none ">
                    <div class="border-bottom pa-1 mr-15">
                        Name
                    </div>
                </td>
                <td class="border-none">
                    <div class="border-bottom pa-1 ml-15">
                        Name
                    </div>
                </td>
            </tr>
            <tr>
                <td class="border-none ">
                    <div class="border-bottom pa-1 mr-15">
                        Phone
                    </div>
                </td>
                <td class="border-none">
                    <div class="border-bottom pa-1 ml-15">
                        Phone
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-6 border-none">
                    <div class="pa-1 mr-15">
                        Sign
                    </div>
                </td>
                <td class="col-6 border-none">

                    <div class="pa-1 ml-15">
                        Sign
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-6 border-none">
                    <div class="pa-1 mr-15">
                        <div style="width:350px;min-height:100px;" class="border">
                            <img style="width: 100%;" src="" alt="Technician Sign" />
                        </div>
                    </div>
                </td>
                <td class="col-6 border-none">

                    <div class=" pa-1 ml-15">
                        <div style="width:350px;" class="border">
                            <img style="width: 100%;height:100px;" src="{{ $item['sign'] }}" alt="Customer Sign" />
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <footer>
        <hr class="mt-1" style="color:#dddddd;">
        <table>
            <tr>
                <td class="text-left border-none col-4">
                    <div>
                        Printed On {{ date('d M Y') }}
                    </div>
                </td>
                <td class="text-center border-none col-4 ">
                    <div>
                        This is system generated report
                    </div>
                </td>
                <td class="text-right border-none col-4">
                    <div class="company-info">
                        1/1

                    </div>
                </td>
            </tr>
        </table>
    </footer>
</body>

</html>
