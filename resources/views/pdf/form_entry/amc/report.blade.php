<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap"> --}}

    <style>
        * {
            font-family: "Source Sans Pro", sans-serif !important;
            margin: 0;
            padding: 0;
            font-size: 11px;
        }

        body {
            margin: 25px 25px 0 25px;
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

        .page-break {
            /* page-break-after: always; */
            page-break-before: always !important;
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

        @media print {
            .no-print {
                display: none;
            }

            @page {
                size: A4;
                margin: 20px !important;
            }

            .footer-print {
                position: fixed;
                bottom: 0;
                width: 100%;
            }

            .page-break {
                page-break-before: always !important;
            }

            .uppercase-text {
                text-transform: uppercase;
            }

            .top-border {
                border-top: 1px solid #dddddd;
            }

            .bottom-border {
                border-bottom: 1px solid #dddddd;
            }

            .tb-border {
                border-top: 1px solid #dddddd;
                border-bottom: 1px solid #dddddd;
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }

            td,
            th {
                border-top: 1px solid #dddddd;
                border-bottom: 1px solid #dddddd;
                text-align: left;
                padding: 3px;
                font-size: 10px;
            }

            .table-font-color {
                color: #777777;
            }

            .left-border {
                border-left: 1px solid #dddddd;
            }

            .right-border {
                border-right: 1px solid #dddddd;
            }

            .footer-font-size {
                font-size: 9px;
            }


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
                <h5 class="reds ">AKIL SECURITY AND ALARM SYSTEMS</h5>
                <div class="greens" style="line-height: 1">
                    <small class="">Khalid Bin Waleed Road, Dubai, UAE</small>
                </div>
                <div class="greens" style="line-height: 1">
                    <small class=""> Tel : 04 3939 562, mail@akilgroup.com</small>
                </div>
            </td>
        </tr>

        <tr>
            <td class="text-left border-none col-4"></td>
            <td class="text-center border-none col-4 uppercase">
                <div>
                    <b class="">{{ $item['equipment_category']['name'] }} PREVENTIVE MAINTENANCE REPORT </b>
                    <div class="border-top border-bottom ">{{ $item['date'] }}</div>
                </div>
            </td>
            <td class="text-right border-none col-4"></td>
        </tr>
    </table>
    <table class="table mt-1">
        <tr class="my-blue text-white ">
            <th>Company Details</th>
        </tr>
    </table>
    <table class="table">
        <tr>
            <td style="width: 150px">Company Name</td>
            <td colspan="6">{{ $item['amc']['contract']['company']['name'] ?? '---' }}</td>
        </tr>

        <tr>
            <td>Management Company</td>
            <td colspan="4">Kingfield Management Company</td>
            <td>Email</td>
            <td>manager@kingfield.com</td>
        </tr>

        <tr>
            <td>Manager</td>
            <td>{{ $item['amc']['contract']['company']['contact']['name'] ?? '---' }}</td>
            <td>Email</td>
            <td colspan="2">{{ $item['amc']['contract']['company']['contact']['email'] ?? '---' }}</td>
            <td>Phone</td>
            <td>{{ $item['amc']['contract']['company']['contact']['number'] ?? '---' }}</td>
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
            <td colspan="4">{{ $item['amc']['contract']['company']['address'] ?? '---' }}</td>
            <td>Makani Number</td>
            <td>{{ $item['amc']['contract']['company']['makani_number'] ?? '---' }}</td>
        </tr>
    </table>

    <table class="table mt-1">
        <tr class="my-blue text-white ">
            <th>AMC Details
            </th>
        </tr>
    </table>
    <table class="table ">
        <tr>
            <td style="width: 150px">AMC Start Date</td>
            <td>{{ $item['amc']['contract']['show_start_date'] ?? '---' }}</td>
            <td colspan="2">AMC Expire Date</td>
            <td>{{ $item['amc']['contract']['show_expire_date'] ?? '---' }}</td>
        </tr>
        <tr>
            <td>Equipment</td>
            <td colspan="2">{{ $item['equipment_category']['name'] ?? '---' }}</td>
            <td>LPO Number</td>
            <td>-----</td>
        </tr>
    </table>

    <table class="table mt-1">
        <tr class="my-blue text-white ">
            <th>Equipement Details
            </th>
        </tr>
    </table>
    <table class="table">
        <tr>
            <td style="width: 150px">Recorder</td>
            <td colspan="2">{{ $equipment['recorder_brand'] }}</td>
            <td>Total Qty</td>
            <td>{{ $equipment['recorder_qty'] }}</td>
            <td>HDD</td>
            <td>{{ $equipment['recorder_capacity'] }}</td>
        </tr>
        <tr>
            <td style="width: 150px">Work Station</td>
            <td colspan="2">{{ $equipment['work_station'] }}</td>
            <td>Total Qty</td>
            <td colspan="3">{{ $equipment['work_station_qty'] }}</td>
        </tr>
        <tr>
            <td style="width: 150px">Camera</td>
            <td colspan="2">{{ $equipment['camera'] }}</td>
            <td>Total Qty</td>
            <td colspan="3">{{ $equipment['camera_qty'] }}</td>
        </tr>
        <tr>
            <td style="width: 150px">Monitor</td>
            <td colspan="2">{{ $equipment['monitor'] }}</td>
            <td>Total Qty</td>
            <td colspan="3">{{ $equipment['monitor_qty'] }}</td>
        </tr>
        <tr>
            <td style="width: 150px">UPS</td>
            <td>{{ $equipment['ups'] }}</td>
            <td>{{ $equipment['ups_specs'] }}</td>
            <td>Total Qty</td>
            <td colspan="3">{{ $equipment['ups_qty'] }}</td>
        </tr>
        <tr>
            <td style="width: 150px">Network Switch</td>
            <td>{{ $equipment['network'] }}</td>
            <td>{{ $equipment['network_specs'] }}</td>
            <td>Total Qty</td>
            <td colspan="3">{{ $equipment['network_qty'] }}</td>
        </tr>
    </table>

    <table class="table mt-1">
        <tr>
            <td class="text-left border-none col-4"></td>
            <td class="text-center border-none col-4 uppercase">
                <div class="border-top border-bottom "><b class="">CHECKLIST</b></div>
            </td>
            <td class="text-right border-none col-4"></td>
        </tr>
    </table>

    @foreach ($checklist as $key => $checklistItem)
        <table class="table mt-1">
            <tr class="my-blue text-white ">
                <th>{{ $key + 1 }}. {{ $checklistItem['heading'] }}</th>
            </tr>
        </table>
        <table class="table">
            @foreach ($checklistItem['questions'] as $qKey => $question)
                <tr>
                    {{-- "": "Excellent",
                "remarks": null,
                "isRemarks": false,
                "attachment_name": null,
               --}}
                    <td style="width: 50px">{{ $key + 1 }}. {{ $qKey + 1 }}</td>
                    <td>{{ $question['question'] }}</td>
                    <td style="width: 100px"></td>

                    <td style="width: 200px; border-bottom: 1px white solid !important"
                        class="{{ getCellStyle($question['selectedOption']) }} text-white text-center">
                        {{ $question['selectedOption'] }}</td>
                </tr>
            @endforeach
        </table>
    @endforeach

    <table class="table page-break">
        <tr class="my-blue text-white ">
            <th>Technician Summary
            </th>
        </tr>
    </table>
    <table class="table">
        <tr>
            <td>{{ $item['summary'] ?? '---' }}</td>
        </tr>
    </table>

    <table class="table mt-1">
        <tr class="my-blue text-white ">
            <th>Customer Comments
            </th>
        </tr>
    </table>
    <table class="table">
        <tr>
            <td>{{ $item['customer_note'] ?? '---' }}</td>
        </tr>
    </table>


    <table class="table mt-2">
        <tr class="my-blue text-white ">
            <th>Technician Signature
            </th>
        </tr>
    </table>

    <table class="table">
        <tr>
            <td class="text-left border-none col-6">
                <table>
                    <tr style="border-bottom: 1px solid #dddddd;">
                        <td class="pa-1" style="border: none">
                            <b>Name</b>
                            <div>
                                {{ $item['technician']['name'] ?? '---' }}
                            </div>
                        </td>
                    </tr>
                    <tr style="border-bottom: 1px solid #dddddd;">
                        <td class="pa-1" style="border: none">
                            <b>Phone</b>
                            <div>
                                {{ $item['technician']['phone_number'] ?? '---' }}
                            </div>
                        </td>
                    </tr>
                    <tr style="border-bottom: 1px solid #dddddd;">
                        <td class="pa-1" style="border: none">
                            <b>Email</b>
                            <div>
                                {{ $item['technician']['email'] ?? '---' }}
                            </div>
                        </td>
                    </tr>
                    <tr style="border-bottom: 1px solid #dddddd;">
                        <td class="pa-1" style="border: none">
                            <b>Date Time</b>
                            <div>
                                {{ $item['technician_signed_datetime'] ?? '---' }}
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
            <td class="border-none col-6">
                <div style="width:175px; margin:0 auto;">
                    @if ($item['sign'])
                        <img class="witdh-100" src="{{ $item['sign'] }}" alt="Company Logo" />
                    @endif
                </div>
            </td>
        </tr>
    </table>

    <table class="table mt-2">
        <tr class="my-blue text-white ">
            <th>Customer Signature
            </th>
        </tr>
    </table>

    <table class="table">
        <tr>
            <td class="text-left border-none col-6">
                <table>
                    <tr style="border-bottom: 1px solid #dddddd;">
                        <td class="pa-1" style="border: none">
                            <b>Name</b>
                            <div>
                                {{ $item['customer_name'] ?? '---' }}
                            </div>
                        </td>
                    </tr>
                    <tr style="border-bottom: 1px solid #dddddd;">
                        <td class="pa-1" style="border: none">
                            <b>Phone</b>
                            <div>
                                {{ $item['customer_phone'] ?? '---' }}
                            </div>
                        </td>
                    </tr>

                    <tr style="border-bottom: 1px solid #dddddd;">
                        <td class="pa-1" style="border: none">
                            <b>Date Time</b>
                            <div>
                                {{ $item['customer_signed_datetime'] ?? '---' }}
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
            <td class="border-none col-6">
                <div style="width:175px; margin:0 auto;">
                    @if ($item['customer_sign'])
                        <img class="witdh-100" src="{{ $item['customer_sign'] }}" alt="Company Logo" />
                    @endif
                </div>
            </td>
        </tr>
    </table>

    <?php
    function getCellStyle($selectedOption)
    {
        if (in_array($selectedOption, ['Excellent', 'Good', 'Yes'])) {
            return 'my-green';
        } elseif (in_array($selectedOption, ['N/A'])) {
            return 'grey lighten-2';
        } else {
            return 'my-red';
        }
    }
    ?>

</body>

</html>
