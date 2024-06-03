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
            margin: 25px 25px 25px 25px;
        }

        .checklist-table {
            height: 50px;
        }

        .border {
            padding: 5px;
            border: 1px solid #dddddd;
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
            background-color: #408DFB !important;
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

        .circle-container {
            text-align: left;
        }

        .circle-container img {
            border-radius: 50%;
            max-width: 100%;
            vertical-align: middle;
            /* Adjust as needed for spacing */
        }

        .width-100 {
            width: 100%;
        }

        .width-50 {
            width: 50%;
        }

        .text-white {
            color: #fff;
        }

        .footer {
            position: fixed;
            bottom: 2mm;
            left: 10mm;
            right: 10mm;
            text-align: center;
            font-size: 12px;
        }

        .page-number:after {
            content: counter(page);
        }
    </style>
</head>

<body>
    <div class="footer">
        <hr class="mt-1" style="color:#dddddd;">
        <table>
            <tr>
                <td class="text-left border-none col-4">
                    <div>
                        Report Date {{ $item['date'] }}
                    </div>
                </td>
                <td class="text-center border-none col-4 ">
                    <div>
                        This is system generated report
                    </div>
                </td>
                <td class="text-right border-none col-4">
                    Page <span class="page-number"></span>
                </td>
            </tr>
        </table>
    </div>
    <div>
        <table class="">
            <tr>
                <td class="text-left border-none col-4">
                    <div class="logo pt">
                        <img class="width-100" src="https://amc.mytime2cloud.com/mail-logo.png" alt="Company Logo" />
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
                        <b class="">FIELD SERVICE REPORT </b>
                        <div class="border-top border-bottom ">{{ $item['date'] }}</div>
                    </div>
                </td>
                <td class="text-right border-none col-4"></td>
            </tr>

            <tr>
                <td class="text-left border-none col-4"></td>
                <td class="text-center border-none col-4"></td>

                <td class="text-left border-none col-4 uppercase">
                    <div>
                        <div class="border-none">Ticket Number :
                            {{ $item['id'] }}</div>
                        <div class="border-none" style="padding-top:5px;padding-bottom:5px;">Customer Reported Date :
                            {{ $item['date'] }}</div>

                        <div class="border-none ">Issue Rectified Date :

                            {{ $item['ticket_close_date_time'] }}</div>
                    </div>
                </td>
            </tr>
        </table>
        <table class=" mt-1">
            <tr class="my-blue text-white ">
                <th>Company Details</th>
            </tr>
        </table>
        <table>
            <tr>
                <td style="width: 150px">Company Name</td>
                <td colspan="6">{{ $company['name'] ?? '---' }}</td>
            </tr>
            <tr>
                <td>Management Company</td>
                <td colspan="4">{{ $company['management_company_name'] ?? '---' }}</td>
                <td>Email</td>
                <td>{{ $company['management_company_email'] ?? '---' }}</td>
            </tr>
            <tr>
                <td>Manager</td>
                <td>{{ $company['contact']['name'] ?? '---' }}</td>
                <td>Email</td>
                <td colspan="2">{{ $company['contact']['email'] ?? '---' }}</td>
                <td>Phone</td>
                <td>{{ $company['contact']['number'] ?? '---' }}</td>
            </tr>
            <tr>
                <td>Action Plan Issued By</td>
                <td>{{ $company['action_plan_issued_by'] ?? '---' }}</td>
                <td colspan="2">Plot No</td>
                <td>{{ $company['plot_number'] ?? '---' }}</td>
                <td>Land DM No</td>
                <td>{{ $company['land_dm_number'] ?? '---' }}</td>
            </tr>
            <tr>
                <td>Address</td>
                <td colspan="4">{{ $company['address'] ?? '---' }}</td>
                <td>Makani Number</td>
                <td>{{ $company['makani_number'] ?? '---' }}</td>
            </tr>
        </table>

        <table class="mt-1">
            <tr class="my-blue text-white ">
                <th>Issue Reported by Customer
                </th>
            </tr>
        </table>
        <table>
            <tr>
                <td>{{ $ticket['description'] ?? '---' }}</td>
            </tr>
        </table>

        <table class="mt-1">
            <tr class="my-blue text-white ">
                <th>Problem Describe by Technician
                </th>
            </tr>
        </table>
        <table>
            <tr>
                <td>{{ $item['description'] ?? '---' }}</td>
            </tr>
        </table>

        <table class="mt-1">
            <tr class="my-blue text-white ">
                <th>Action Taken By Technician
                </th>
            </tr>
        </table>
        <table>
            <tr>
                <td>{{ $item['action_taken'] ?? '---' }}</td>
            </tr>
        </table>

        <table class="mt-1">
            <tr class="my-blue text-white">
                <th>Recommendation/ suggestion to customer
                </th>
            </tr>
        </table>
        <table>
            <tr>
                <td>{{ $item['summary'] ?? '---' }}</td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>

        </table>

        @foreach ($checklist as $key => $checklistItem)
            <table class="table mt-1">
                <tr class="my-blue text-white ">
                    <th>{{ $checklistItem['heading'] }}</th>
                </tr>
            </table>
            <table>
                @foreach ($checklistItem['questions'] as $qKey => $question)
                    <tr>
                        <td style="width: 50px">{{ $key + 1 }}. {{ $qKey + 1 }}
                        </td>
                        <td>{{ $question['question'] }}</td>

                        <td style="width: 200px; border-bottom: 1px white solid !important"
                            class="{{ getCellStyle($question['selectedOption']) }}  text-white text-center">
                            {{ $question['selectedOption'] }}
                        </td>
                    </tr>
                @endforeach
            </table>
        @endforeach

        <table class="table mt-2 page-break">
            <tr class="my-blue text-white">
                <th colspan="2">Technician Signature</th>
            </tr>
            <tr>
                <td class="border-none col-6">
                    <div style="padding: 2px">
                        <div><strong>Name</strong></div>
                        <div class="border-bottom">{{ $technician['name'] }}</div>
                    </div>
                    <div style="padding: 2px">
                        <div><strong>Phone</strong></div>
                        <div class="border-bottom">{{ $technician['phone_number'] }}</div>
                    </div>
                    <div style="padding: 2px">
                        <div><strong>Email</strong></div>
                        <div class="border-bottom">{{ $technician['email'] }}</div>
                    </div>
                    <div style="padding: 2px">
                        <div><strong>Date Time</strong></div>
                        <div class="border-bottom">{{ $item['technician_signed_datetime'] }}</div>
                    </div>
                </td>
                <td class="border-none col-6">
                    <div style="text-align: center;">
                        @if (env('APP_ENV') == 'local')
                            <img style="width:125px;margin:0 auto;"
                                src="https://amcbackend.mytime2cloud.com/sign/1717423099.png"
                                alt="Image Description" />
                        @else
                            <img style="width:125px;margin:0 auto;" src="{{ $item['sign'] }}"
                                alt="Image Description" />
                        @endif



                    </div>
                </td>
            </tr>
        </table>

        <table class="table mt-2">
            <tr class="my-blue text-white">
                <th colspan="2">Customer Signature</th>
            </tr>
            <tr>
                <td class="border-none col-6">
                    <div style="padding: 2px">
                        <div><strong>Name</strong></div>
                        <div class="border-bottom">{{ $technician['customer_name'] ?? "---" }}</div>
                    </div>
                    <div style="padding: 2px">
                        <div><strong>Phone</strong></div>
                        <div class="border-bottom">{{ $technician['customer_phone'] ?? "---" }}</div>
                    </div>
                    <div style="padding: 2px">
                        <div><strong>Date Time</strong></div>
                        <div class="border-bottom">{{ $item['customer_signed_datetime'] }}</div>
                    </div>
                </td>
                <td class="border-none col-6">
                    <div style="text-align: center;">
                        @if (env('APP_ENV') == 'local')
                            <img style="width:125px;margin:0 auto;"
                                src="https://amcbackend.mytime2cloud.com/sign/1717423099.png"
                                alt="Image Description" />
                        @else
                            <img style="width:125px;margin:0 auto;" src="{{ $item['customer_sign'] }}"
                                alt="Image Description" />
                        @endif

                    </div>
                </td>
            </tr>
        </table>

        @if (env('APP_ENV') == 'local')
            <table class="table mt-2 page-break">
                <tr class="my-blue text-white">
                    <th colspan="2">Attachments
                    </th>
                </tr>

                @foreach (range(1, 2) as $attachments)
                    <tr>
                        @foreach (range(1, 2) as $attachment)
                            <td class="border-none col-6">
                                <div style="padding: 2px">
                                    <div class="border">pic-1.2.1</div>

                                    <img class="width-100"
                                        src="https://amcbackend.mytime2cloud.com/checklist/72/pic-1.2.1.png">
                                </div>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        @endif

        @if (count($attachmentChunks) > 0)
            <table class="table mt-2 page-break">
                <tr class="my-blue text-white">
                    <th colspan="2">Attachments
                    </th>
                </tr>

                @foreach ($attachmentChunks as $attachments)
                    <tr>
                        @foreach ($attachments as $attachment)
                            <td class="border-none col-6">
                                <div style="padding: 2px">
                                    <div class="border">{{ $attachment['attachment'] }}</div>

                                    @if (env('APP_ENV') == 'local')
                                        <img class="width-100"
                                            src="https://amcbackend.mytime2cloud.com/checklist/72/pic-1.2.1.png">
                                    @else
                                        <img class="width-100"
                                            src="https://amcbackend.mytime2cloud.com/checklist/{{ $attachment['form_entry_id'] }}/{{ $attachment['attachment'] }}">
                                    @endif

                                </div>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        @endif
    </div>



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
