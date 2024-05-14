<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <style>
        * {
            /* font-family: "Source Sans Pro", sans-serif !important; */
            margin: 0;
            padding: 0;
        }

        body {
            margin: 15px 15px 0 15px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            padding: 4px;
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

        .my-blue {
            background-color: #4640d4 !important;
        }

        .my-green {
            background-color: #a2b63b !important;
        }

        .my-red {
            background-color: #e04e4f !important;
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

        .witdh-100 {
            width: 100%;
        }

        .text-white {
            color: #fff;
        }
    </style>
</head>

<body>
    <table class="table">
        <tr>
            <td class="text-left border-none col-4">
                <div class="logo pt">
                    <img class="witdh-100" src="https://amc.mytime2cloud.com/mail-logo.png" alt="Company Logo" />
                </div>
            </td>
            <td class="text-center border-none col-4 uppercase"></td>
            <td class="text-right border-none col-4">
                <h5 class="reds">AKIL SECURITY AND ALARM SYSTEMS</h5>
                <div class="greens" style="line-height: 1">
                    <small>Khalid Bin Waleed Road, Dubai, UAE</small>
                </div>
                <div class="greens" style="line-height: 1">
                    <small> Tel : 04 3939 562, mail@akilgroup.com</small>
                </div>
            </td>
        </tr>

        <tr>
            <td class="text-left border-none col-4"></td>
            <td class="text-center border-none col-4 uppercase">
                <div>
                    <b>ACCESS CONTROL PREVENTIVE MAINTENANCE REPORT </b>
                    <div class="border-top border-bottom">14 May 2024</div>
                </div>
            </td>
            <td class="text-right border-none col-4"></td>
        </tr>
    </table>
    <table class="table">
        <tr class="my-blue text-white">
            <th>Company Details</th>
        </tr>
    </table>
    <table class="table">
        <tr>
            <td style="width: 150px">Company Name</td>
            <td colspan="6">ABC Company</td>
        </tr>

        <tr>
            <td>Management Company</td>
            <td colspan="4">Kingfield Management Company</td>
            <td>Email</td>
            <td>manager@kingfield.com</td>
        </tr>

        <tr>
            <td>Manager</td>
            <td>John Doe</td>
            <td>Email</td>
            <td colspan="2">john.doe@example.com</td>
            <td>Phone</td>
            <td>123-456-7890</td>
        </tr>
        <tr>
            <td>Action Plan Issued By</td>
            <td>Dubai Municipality</td>
            <td colspan="2">Plot No</td>
            <td>3920570</td>
            <td>Land DM No</td>
            <td>392-570</td>
        </tr>
        <tr>
            <td>Address</td>
            <td colspan="4">123 Main Street, Dubai, UAE</td>
            <td>Makani Number</td>
            <td>1234567890</td>
        </tr>
    </table>
</body>

</html>