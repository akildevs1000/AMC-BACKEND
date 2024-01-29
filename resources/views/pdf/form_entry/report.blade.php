<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Access Control Report</title>
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
                    Date: 24 Jan 2024
                </div>

            </td>
            <td class="border-none col-4 uppercase">
                <div class="border-top border-bottom">
                    AMC Agreement Number:<b>41</b>
                </div>
            </td>
            <td class="border-none col-4 uppercase">
                <div class="border-top border-bottom">
                    Ticket Number: 2
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
                        Company Name: <b>Fulton Trading</b>
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        License Issuer: <b>Laborum Nostrum nih</b>
                    </div>
                </td>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        License Number: <b>896</b>
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Address: <b>Quasi sit fugit et</b>
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        LPO Number: <b>Fulton Trading</b>
                    </div>
                </td>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        AMC Since: <b>01 Jan 2024</b>
                    </div>
                </td>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        AMC Expire: <b>31 Dec 2024</b>
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
                        Reported By: <b>Zane Dixon, Esse veritatis dolor</b>
                    </div>
                </td>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Reported Date: <b>23 Jan 24 16:07:30</b>
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Product Category: <b>Access Control</b>
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
                        Description: <b></b>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none ">
                    <div class="border-bottom pa-2">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none ">
                    <div class="border-bottom pa-2">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none ">
                    <div class="border-bottom pa-2">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none ">
                    <div class="border-bottom pa-2">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none ">
                    <div class="border-bottom pa-2">
                    </div>
                </td>
            </tr>
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
                        Actual Problem: <b>test</b>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Action Taken: <b>test</b>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Description: tets
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none ">
                    <div class="border-bottom pa-2">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none ">
                    <div class="border-bottom pa-2">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none ">
                    <div class="border-bottom pa-2">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none ">
                    <div class="border-bottom pa-2">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none ">
                    <div class="border-bottom pa-2">
                    </div>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Ticket Status: <b>Pending</b>
                    </div>
                </td>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Date: <b></b>
                    </div>
                </td>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Engineer Name : <b>francis</b>
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
                            <li>write your summary here</li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none ">
                    <div class="border-bottom pa-2">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none ">
                    <div class="border-bottom pa-2">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none ">
                    <div class="border-bottom pa-2">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none ">
                    <div class="border-bottom pa-2">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none ">
                    <div class="border-bottom pa-2">
                    </div>
                </td>
            </tr>
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
            {{-- <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Name
                    </div>
                </td>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Name
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Phone
                    </div>
                </td>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Phone
                    </div>
                </td>
            </tr>
            <tr>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Sign
                    </div>
                </td>
                <td class="col-4 border-none">
                    <div class="border-bottom pa-1">
                        Sign
                    </div>
                </td>
            </tr> --}}
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
