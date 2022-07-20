<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accomplishment Report</title>
    <style>
        body {
            font-family : Inter, sans-serif;
        }

        .text-center {
            text-align : center;
        }

        .text-right {
            text-align : right;
        }

        .font-weight-bold {
            font-weight : bold;
        }
        table, td, th {
            border-collapse: separate;
            border-spacing: 0px;
        }
        tbody  td {
            border: 1px solid black;
            border-spacing: 0px;
            padding-top: 5px;
            padding-bottom: 5px;
            font-size: 16px;
        }
        tfoot  td {
            border: none;
            border-spacing: 0px;
        }

        .dotted-line {
            border: 1px dotted black;
        }

        .signatory {
            border-top: 1px solid black;
            margin-left: 125px;
            font-weight: normal;
        }
        .signature {
            margin-left: 125px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>

    <table width="100%">
        <tr>
            <td class="text-center" style="border: none;"><img src="file:///laragon/www/accomplishmentReport/public/assets/images/sds-logo.png" width="60%"></td>
            <td class="text-center" style="border: none;">
                <h3 class="text-center" style="margin-top: 0; margin-bottom: 0; font-family: Comic Sans;">PROVINCIAL GOVERNOR'S OFFICE</h3>
                <h2 class="text-center" style="margin-top: 0; margin-bottom: 0; letter-spacing: 2px;">INFORMATION TECHNOLOGY UNIT</h1>
                <h4 class="text-center" style="font-weight: normal; margin-top: 0; margin-bottom: 0;">Capitol Hills, Tandag City, Surigao del Sur</h4>
            </td>
            <td class="text-center" style="border: none;"><img src="file:///laragon/www/accomplishmentReport/public/assets/images/itu-logo.png" width="60%"></td>
        </tr>
    </table>

    <h2 style="margin-bottom: 2px;">Service Request Form</h1>
    <hr style="border: 2px solid gray; margin-top: 0px;">

    <h3 style="text-decoration: underline;">Client's Information</h3>
    <table width="100%"> 
        <tr>
            <td width="25%">Control Number:</td>
            <td colspan="3" style="text-transform: uppercase; padding-left: 37px;">{{ $accoms->control_no }}</td>
        </tr>
        <tr>
            <td width="25%">Office:</td>
            <td colspan="3" style="text-transform: uppercase; padding-left: 37px;">{{ $accoms->office }}</td>
        </tr>
        <tr>
            <td width="28%">Date/Time of Request/Complaint:</td>
            <td colspan="3" style="text-transform: uppercase; padding-left: 37px;">{{ date('Y-m-d', strtotime($accoms->request_date)) }}</td>
        </tr>
        <tr>
            <td width="25%">Date/Time Acted:</td>
            <td class="text-center" width="25%" style="text-transform: uppercase;">{{ date('Y-m-d', strtotime($accoms->date_acted))  }}</td>
            <td width="25%">Date Time:Completed</td>
            <td class="text-center" width="25%" style="text-transform: uppercase;">{{ date('Y-m-d', strtotime($accoms->date_completed))  }}</td>
        </tr>
    </table>
    
    <h3>Problems/Request Description</h3>
    <table width="100%" height="100px">
        <tr>
            <td style="text-transform: uppercase; padding-left: 37px;">{{ $accoms->problem }}</td>
        </tr>
    </table>

    <h3>Result/Recommendation</h3>
    <table width="100%" height="100px">
        <tr>
            <td style="text-transform: uppercase; padding-left: 37px;">{{ $accoms->solution }}</td>
        </tr>
    </table>

    <h4 style="margin-bottom: 35px; font-weight: normal;">Requested by:</h4>

    <h3 style="margin-bottom: 0; width: 30%" class="signature text-center">{{ $blank == 1 ? '' :  $accoms->requested_by }}</h3>
    <h4 class="signatory text-center" style="margin-top: 0; width: 30%">Client/Signature Over Printed Name</h4>

    <h4 style="margin-bottom: 35px; font-weight: normal;">Approved by:</h4>

    <h3 style="margin-bottom: 0; width: 35%" class="signature text-center">{{ $blank == 1 ? '' : $accoms->approved_by }}</h3>
    <h4 class="signatory text-center" style="margin-top: 0; width: 35%">Head of Office / Signature over Printed Name</h4>

    <div class="dotted-line"></div>

    <h3 style="text-decoration: underline; ">For ITU Personnel</h3>
    <p style="margin-bottom: 50px; margin-left: 40px">I hereby certify that all the foregoing information is true, accurate and contains no false and misleading facts.</p>

    <h3 style="margin-bottom: 0; width: 50%" class="signature text-center">{{ $fullname }}</h3>
    <h4 class="signatory text-center" style="margin-top: 0; width: 50%">Technician / System Maintenance/ Signature over Printed Name</h4>
    <br>
    <h4 style="font-weight: normal;">Noted by:</h4>

    <h3 style="margin-bottom: 0; text-decoration: underline" class="text-center">ANDREW P. PATRIMONIO</h3>
    <h4 style="margin-top: 0; font-weight: normal" class="text-center">IT OFFICER II/ITU</h4>
</body>
</html>