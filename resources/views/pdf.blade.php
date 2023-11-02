@php

function get_state_name($id) {
    $states = [
        [ 'value' => '1' , 'label' => 'JAMMU AND KASHMIR'],
        [ 'value' => '2' , 'label' => 'HIMACHAL PRADESH'],
        [ 'value' => '3' , 'label' => 'PUNJAB'],
        [ 'value' => '4' , 'label' => 'CHANDIGARH'],
        [ 'value' => '5' , 'label' => 'UTTARAKHAND'],
        [ 'value' => '6' , 'label' => 'HARYANA'],
        [ 'value' => '7' , 'label' => 'DELHI'],
        [ 'value' => '8' , 'label' => 'RAJASTHAN'],
        [ 'value' => '9' , 'label' => 'UTTAR PRADESH'],
        [ 'value' => '10' , 'label' => 'BIHAR'],
        [ 'value' => '11' , 'label' => 'SIKKIM'],
        [ 'value' => '12' , 'label' => 'ARUNACHAL PRADESH'],
        [ 'value' => '13' , 'label' => 'NAGALAND'],
        [ 'value' => '14' , 'label' => 'MANIPUR'],
        [ 'value' => '15' , 'label' => 'MIZORAM'],
        [ 'value' => '16' , 'label' => 'TRIPURA'],
        [ 'value' => '17' , 'label' => 'MEGHALAYA'],
        [ 'value' => '18' , 'label' => 'ASSAM'],
        [ 'value' => '19' , 'label' => 'WEST BENGAL'],
        [ 'value' => '20' , 'label' => 'JHARKHAND'],
        [ 'value' => '21' , 'label' => 'ORISSA'],
        [ 'value' => '22' , 'label' => 'CHHATTISGARH'],
        [ 'value' => '23' , 'label' => 'MADHYA PRADESH'],
        [ 'value' => '24' , 'label' => 'GUJARAT'],
        [ 'value' => '26' , 'label' => 'DADAR AND NAGAR HAVELI & DAMAN AND DIU'],
        [ 'value' => '27' , 'label' => 'MAHARASHTRA'],
        [ 'value' => '29' , 'label' => 'KARNATAKA'],
        [ 'value' => '30' , 'label' => 'GOA'],
        [ 'value' => '31' , 'label' => 'LAKSHADWEEP'],
        [ 'value' => '32' , 'label' => 'KERALA'],
        [ 'value' => '33' , 'label' => 'TAMIL NADU'],
        [ 'value' => '34' , 'label' => 'PUDUCHERRY'],
        [ 'value' => '35' , 'label' => 'ANDAMAN AND NICOBAR'],
        [ 'value' => '36' , 'label' => 'TELANGANA'],
        [ 'value' => '37' , 'label' => 'ANDHRA PRADESH'],
        [ 'value' => '38' , 'label' => 'LADAKH'],
        [ 'value' => '97' , 'label' => 'OTHER TERRITORY'],
        [ 'value' => '99' , 'label' => 'OTHER COUNTR']
    ];

    // Loop through the $states array to find a match and return the corresponding label
    foreach ($states as $state) {
        if ($state['value'] === $id) {
            return $state['label'];
        }
    }

    // Return a default value or an error message if the ID is not found
    return 'State not found';
}
 
@endphp
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            text-indent: 0;
        }

        .s1 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 9pt;
            vertical-align: -1pt;
        }

        h2 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 9pt;
        }

        h1 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 12pt;
        }

        .p,
        p {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 9pt;
            margin: 0pt;
        }

        .s3 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 9pt;
        }

        .s4 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 9pt;
        }

        .s5 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 9pt;
            vertical-align: 1pt;
        }

        li {
            display: block;
        }

        #l1 {
            padding-left: 0pt;
            counter-reset: c1 4;
        }

        #l1>li>*:first-child:before {
            counter-increment: c1;
            content: counter(c1, decimal)". ";
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 9pt;
        }

        #l1>li:first-child>*:first-child:before {
            counter-increment: c1 0;
        }

        table,
        tbody {
            vertical-align: top;
            overflow: visible;
        }

        span.f-title {
            font-size: 13px;
            width: 91px;
            display: inline-block;
            margin-right: 3px;
        }

        span.l-title {
            font-weight: 600;
            font-size: 13px;
            margin-left: 2px;
        }

        span.m-title {
            margin-right: 6px;
        }

        td.top-table-td {
            width: 280px;
        }

        .custom-td-style-test-box {
            width: 260px;
            margin: 7px 0px;
            margin-left: 4px;
        }

        .border-style {
            border-top-style: solid;
            border-top-width: 1pt;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
        }
        .border-style-bottom-none {
            
            border-bottom-style: solid;
            border-bottom-width: 0pt !important;
        }

        .top-table-td-sec {
            width: 250px !important;
        }
    </style>
</head>

<body>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <p class="s1" style="padding-top: 7pt;padding-left: 7pt;text-indent: 0pt;text-align: left;">Doc No. : <b></b></p>
    <p class="s1" style="padding-left: 7pt;text-indent: 0pt;text-align: left;">Date : <b>{{$data['alldeta']->generated_date}}</b></p>
    <h1 style="padding-top: 4pt;padding-left: 7pt;text-indent: 0pt;text-align: center;width: 786px;font-size: 30px;padding-bottom: 80px;">e-Way Bill</h1>
    <p style="padding-left: 7pt;text-indent: 0pt;line-height: 1pt;text-align: left;" />
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <p style="padding-left: 5pt;text-indent: 0pt;line-height: 1pt;text-align: left;" />
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <p style="text-indent: 0pt;text-align: left;"><span>
        </span></p>
    <h2 style="padding-top: 2pt;padding-left: 7pt;text-indent: 0pt;text-align: left;margin-bottom:10px">1. e-Way Bill
        Details</h2>
    <table style="border-collapse:collapse;margin-left:5pt;margin-bottom:5pt" cellspacing="0">
        <tr style="height:38pt">
            <td class="top-table-td">
                <div>
                    <span class="f-title">e-Way Bill No.</span>
                    <span class="m-title">:</span>
                    <span class="l-title">{{$data['alldeta']->id}}</span>
                </div>
                <div>
                    <span class="f-title">Generated By</span>
                    <span class="m-title">:</span>
                    <span class="l-title">{{$data['alldeta']->generatedby}}</span>
                </div>
                <div>
                    <span class="f-title">Supply Type</span>
                    <span class="m-title">:</span>
                    <span class="l-title">Outward-SKD/CKD/Lots</span>
                </div>
            </td>
            <td class="top-table-td top-table-td-sec">
                <div>
                    <span class="f-title">Mode</span>
                    <span class="m-title">:</span>
                    <span class="l-title">{{$data['alldeta']->mode}}</span>
                </div>
                <div>
                    <span class="f-title">Approx Distance</span>
                    <span class="m-title">:</span>
                    <span class="l-title">{{$data['alldeta']->approx_distance}} KM</span>
                </div>
                <div>
                    <span class="f-title">Transaction Type </span>
                    <span class="m-title">:</span>
                    <span class="l-title">Regular</span>
                </div>
            </td>
            <td class="top-table-td">
                <div>
                    <span class="f-title">Generated Date</span>
                    <span class="m-title">:</span>
                    <span class="l-title">{{$data['alldeta']->generated_date}} {{$data['alldeta']->generated_time}}</span>
                </div>
                <div>
                    <span class="f-title">Valid Upto </span>
                    <span class="m-title">:</span>
                    <span class="l-title">{{$data['alldeta']->generated_time}} {{$data['alldeta']->valid_time}}</span>
                </div>
            </td>
        </tr>
    </table>
    <table style="border-collapse:collapse;margin-left:5pt" cellspacing="0">
        <tr style="height:38pt">
            <td style="width:338pt;border-top-style:solid;border-top-width:1pt">
                <p class="s3"
                    style="padding-top: 1pt;padding-left: 2pt;padding-right: 151pt;text-indent: 0pt;line-height: 17pt;text-align: left;">
                    2. Address Details From</p>
            </td>
            <td style="width:139pt;border-top-style:solid;border-top-width:1pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
                <p class="s3" style="padding-left: 4pt;text-indent: 0pt;text-align: left;">To</p>
            </td>
            <td style="width:113pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt"
                colspan="2" rowspan="6">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
        </tr>
        <tr style="height:17pt">
            <td style="width:245pt">
                <p class="s3" style="padding-left: 4pt;text-indent: 0pt;text-align: left;">From</p>
                <p class="s4" style="padding-top: 3pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">{{$data['alldeta']->from_name}}</p>
            </td>
            <td style="width:139pt">
                <p class="s4" style="padding-top: 3pt;padding-left: 4pt;text-indent: 0pt;text-align: left;">{{$data['alldeta']->to_name}}
                </p>
            </td>
        </tr>
        <tr style="height:15pt">
            <td style="width:245pt">
                <p class="s4" style="padding-top: 2pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">GSTIN :
                    {{$data['alldeta']->from_gst}}</p>
            </td>
            <td style="width:139pt">
                <p class="s4" style="padding-top: 2pt;padding-left: 4pt;text-indent: 0pt;text-align: left;">GSTIN :
                    {{$data['alldeta']->to_gst}}</p>
            </td>
        </tr>
        <tr style="height:18pt">
            <td style="width:245pt">
                <p class="s4" style="padding-top: 2pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">{{get_state_name($data['alldeta']->from_state)}}</p>
            </td>
            <td style="width:139pt">
                <p class="s4" style="padding-top: 2pt;padding-left: 4pt;text-indent: 0pt;text-align: left;">{{get_state_name($data['alldeta']->to_state)}}
                </p>
            </td>
        </tr>
        <tr style="height:19pt">
            <td style="width:245pt">
                <p class="s3" style="padding-top: 4pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">Dispatch
                    From</p>
            </td>
            <td style="width:139pt">
                <p class="s3" style="padding-top: 4pt;padding-left: 4pt;text-indent: 0pt;text-align: left;">Ship To</p>
            </td>
        </tr>
        <tr style="height:48pt">
            <td style="width:245pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s4"
                    style="padding-top: 3pt;padding-left: 2pt;padding-right: 38pt;text-indent: 0pt;line-height: 115%;text-align: left;">
                    {{$data['alldeta']->from_address}} {{$data['alldeta']->from_pincode}}</p>
            </td>
            <td style="width:139pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s4"
                    style="padding-top: 3pt;padding-left: 4pt;text-indent: 0pt;line-height: 115%;text-align: left;">
                    {{$data['alldeta']->to_address}} {{$data['alldeta']->to_pincode}}</p>
            </td>
        </tr>
        <tr style="height:23pt">
            <td
                style="width:245pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s3" style="padding-top: 6pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">3. Goods
                    Details</p>
            </td>
            <td
                style="width:139pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td
                style="width:62pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td
                style="width:51pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
        </tr>
        <tr style="height:16pt">
            <td style="width:245pt;border-top-style:solid;border-top-width:1pt">
                <p class="s3" style="padding-top: 3pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">HSN Product
                    Name &amp; Desc</p>
            </td>
            <td style="width:139pt;border-top-style:solid;border-top-width:1pt">
                <p class="s3" style="padding-top: 3pt;padding-left: 70pt;text-indent: 0pt;text-align: left;">Quantity
                </p>
            </td>
            <td style="width:62pt;border-top-style:solid;border-top-width:1pt">
                <p class="s3"
                    style="padding-top: 3pt;padding-left: 4pt;padding-right: 2pt;text-indent: 0pt;text-align: center;">
                    Taxable Amt</p>
            </td>
            <td style="width:51pt;border-top-style:solid;border-top-width:1pt">
                <p class="s3"
                    style="padding-top: 3pt;padding-left: 3pt;padding-right: 7pt;text-indent: 0pt;text-align: center;">
                    Tax Rate</p>
            </td>
        </tr>
        <tr style="height:15pt">
            <td style="width:245pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s3" style="padding-top: 1pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">Code</p>
            </td>
            <td style="width:139pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td style="width:62pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td style="width:51pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s3"
                    style="padding-top: 1pt;padding-left: 3pt;padding-right: 4pt;text-indent: 0pt;text-align: center;">
                    (I)</p>
            </td>
        </tr>
        @foreach($data['product'] as $list)
        
        <tr style="height:30pt">
            <td style="width:245pt;">
                <p class="s5"
                    style="padding-top: 4pt;padding-left: 41pt;text-indent: -39pt;line-height: 12pt;text-align: left;">
                    {{$list->hsn_no}} <span class="s4">{{$list->product_name}}</span></p>
            </td>
            <td style="width:139pt;">
                <p class="s4" style="padding-top: 7pt;padding-left: 85pt;text-indent: 0pt;text-align: left;">{{$list->qty}} MTS
                </p>
            </td>
            <td style="width:62pt;">
                <p class="s3" style="padding-top: 6pt;padding-left: 4pt;text-indent: 0pt;text-align: center;">
                    {{$list->taxable_amount}}</p>
            </td>
            <td style="width:51pt;">
                <p class="s4"
                    style="padding-top: 7pt;padding-left: 3pt;padding-right: 5pt;text-indent: 0pt;text-align: center;">
                    {{$list->taxable_rate}}</p>
            </td>
        </tr>
        @endforeach
    </table>
    <table style="border-collapse:collapse;margin-left:5pt;margin-bottom:5pt" cellspacing="0">
        <tr style="height:23pt">
            <td class="custom-td-style border-style border-style-bottom-none">
                <p class="s3" style="padding-top: 6pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">3. Goods
                    Details</p>
            </td>
            <td class="custom-td-style border-style border-style-bottom-none">

            </td>
            <td class="custom-td-style border-style border-style-bottom-none">

            </td>
        </tr>
        <tr style="height:23pt">
            <td class="custom-td-style">
                <div class="custom-td-style-test-box">
                    <span class="f-title">Tot.Taxable Amt</span>
                    <span class="m-title">:</span>
                    <span class="l-title">1,79,340.00 </span>
                </div>
                <div class="custom-td-style-test-box">
                    <span class="f-title">IGST Amt</span>
                    <span class="m-title">:</span>
                    <span class="l-title">32,281.20 </span>
                </div>
            </td>
            <td class="custom-td-style">
                <div class="custom-td-style-test-box">
                    <span class="f-title">Other Amt</span>
                    <span class="m-title">:</span>
                    <span class="l-title"></span>
                </div>
            </td>
            <td class="custom-td-style">
                <div class="custom-td-style-test-box">
                    <span class="f-title">Total Inv Amt</span>
                    <span class="m-title">:</span>
                    <span class="l-title">2,11,621.20</span>
                </div>
            </td>
        </tr>
    </table>
    <table style="border-collapse:collapse;margin-left:5pt;margin-bottom:5pt" cellspacing="0">
        <tr style="height:23pt">
            <td class="custom-td-style border-style border-style-bottom-none">
                <p class="s3" style="padding-top: 6pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">4.
                    Transportation Details</p>
            </td>
            <td class="custom-td-style border-style border-style-bottom-none">

            </td>
            <td class="custom-td-style border-style border-style-bottom-none">

            </td>
        </tr>
        <tr style="height:23pt">
            <td class="custom-td-style">
                <div class="custom-td-style-test-box">
                    <span class="f-title">Transporter ID</span>
                    <span class="m-title">:</span>
                    <span class="l-title">{{$data['alldeta']->transporter_id}}</span>
                </div>
                <div class="custom-td-style-test-box">
                    <span class="f-title">Name </span>
                    <span class="m-title">:</span>
                    <span class="l-title">{{$data['alldeta']->transporter_name}}</span>
                </div>
            </td>
            <td class="custom-td-style">
                <div class="custom-td-style-test-box">
                    <span class="f-title"></span>
                    <span class="m-title"></span>
                    <span class="l-title"></span>
                </div>
                <div class="custom-td-style-test-box">
                    <span class="f-title"></span>
                    <span class="m-title"></span>
                    <span class="l-title"></span>
                </div>
            </td>
            <td class="custom-td-style">
                <div class="custom-td-style-test-box">
                    <span class="f-title">Doc No.</span>
                    <span class="m-title">:</span>
                    <span class="l-title">{{$data['alldeta']->transporter_doc_no}}</span>
                </div>
                <div class="custom-td-style-test-box">
                    <span class="f-title">Date</span>
                    <span class="m-title">:</span>
                    <span class="l-title">{{$data['alldeta']->transporter_date}}</span>
                </div>
            </td>
        </tr>
    </table>
    <table style="border-collapse:collapse;margin-left:5pt;margin-bottom:5pt" cellspacing="0">
        <tr style="height:23pt">
            <td class="custom-td-style border-style border-style-bottom-none">
                <p class="s3" style="padding-top: 6pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">5. Vehicle
                    Details</p>
            </td>
            <td class="custom-td-style border-style border-style-bottom-none">

            </td>
            <td class="custom-td-style border-style border-style-bottom-none">

            </td>
        </tr>
        <tr style="height:23pt">
            <td class="custom-td-style">
                <div class="custom-td-style-test-box">
                    <span class="f-title">Vehicle No.</span>
                    <span class="m-title">:</span>
                    <span class="l-title">{{$data['alldeta']->vehicle_no}}</span>
                </div>
            </td>
            <td class="custom-td-style">
                <div class="custom-td-style-test-box">
                    <span class="f-title">From</span>
                    <span class="m-title">:</span>
                    <span class="l-title">{{$data['alldeta']->vehicle_place}}</span>
                </div>
            </td>
            <td class="custom-td-style">
                <div class="custom-td-style-test-box">
                    <span class="f-title">CEWB No. </span>
                    <span class="m-title">:</span>
                    <span class="l-title">{{$data['alldeta']->cewb_no}}</span>
                </div>

            </td>
        </tr>
    </table>
</body>

</html>