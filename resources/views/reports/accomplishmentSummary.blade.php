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
        
        tbody  td {
            border: 1px solid black;
            border-spacing: 0px;
            padding-top: 5px;
            padding-bottom: 5px;
            font-size: 18px;
        }
        ul  li {
            margin-left: 40px;
            padding-bottom: 15px;
            font-size: 18px;
        }
        tfoot  td {
            border: none;
            border-spacing: 0px;
        }

        .dotted-line {
            border: 1px dotted black;
        }

        .prepared {
            border-top: 1px solid black;
            margin-left: 125px;
            font-weight: normal;
        }
        .approved {
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
                <h3 class="text-center" style="margin-top: 0; margin-bottom: 0; font-family: Comic Sans;">Republic of the Philippines</h3>
                <h2 class="text-center" style="margin-top: 0; margin-bottom: 0; letter-spacing: 2px;">PROVINCE OF SURIGAO DEL SUR</h1>
                <h4 class="text-center" style="font-weight: normal; margin-top: 0; margin-bottom: 0;">Capitol Hills, Tandag City, Surigao del Sur</h4>
            </td>
            <td class="text-center" style="border: none;"><img src="file:///laragon/www/accomplishmentReport/public/assets/images/itu-logo.png" width="60%"></td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td class="text-center" style="border: none;">
                <h3 class="text-center" style="margin-top: 0; margin-bottom: 0; font-weight: normal;">Office of the Governor</h3>
                <h3 class="text-center" style="margin-top: 0; margin-bottom: 0; letter-spacing: 1px;">INFORMATION TECHNOLOGY UNIT</h3>
                <hr>
            </td>
            <td style="border: none;"></td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td class="text-center" style="border: none;">
                <h3 class="text-center" style="margin-top: 0; margin-bottom: 0;">ACCOMPLISHMENT REPORT</h3>
                <h4 class="text-center" style="margin-top: 0; margin-bottom: 0; font-weight: normal; ">{{ Carbon\Carbon::parse($printFrom)->format('M d, Y') }} - {{ Carbon\Carbon::parse($printTo)->format('M d, Y') }}</h4> 
                <h4 class="text-center" style="margin-top: 0; margin-bottom: 0; font-weight: normal;">(Period Covered)</h4> 
            </td>
            <td style="border: none;"></td>
        </tr>
    </table>
    <div style="margin-bottom: 30px; margin-top: 30px;"></div>
    <ul>
        @foreach($summary as $category => $record)
            <li style="text-transform: uppercase; font-weight: bold;">{{ $category }}</li>
            <ul>
            @foreach($record as $r) 
                @php
                    $accom = strtolower($r->solution);
                @endphp
                <li>{{ ucfirst($accom) }}</li>
            @endforeach
            </ul>
        @endforeach
    </ul>
    {{-- <table width="100%" border="1" style="border-collapse:collapse;" cellpadding="10"> 
        <thead>
            <tr>
                <th width="25%">Date</th>
                <th>Accomplishment</th>
                <th width="25%">Service Category</th>
            </tr>
        </thead>
        @foreach($summary as $sum)
            <tbody>
                <tr>
                    <td class="text-center">{{ Carbon\Carbon::parse($sum->date_acted)->format('M d, Y') }}</td>
                    <td style="text-transform: uppercase; padding-left: 37px;">{{ $sum->solution == '' ? $sum->problem : $sum->solution}}</td>
                    <td class="text-center">{{ $sum->cat->description }}</td>
                </tr>
            </tbody>
        @endforeach
    </table> --}}
    <div style="margin-bottom: 30px; margin-top: 30px;"></div>  
    <table width="100%">
        <tr>
            <td style="border: none;" width="15%">Prepared by:</td>
            <td style="border: none;" width="35%"></td>
            <td style="border: none;" width="15%"></td>
            <td style="border: none;" width="35%"></td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td class="text-center" style="border: none; font-weight: bold; border-bottom: 1px solid black;"> <span>{{ Auth::user()->firstname . ' ' . substr(Auth::user()->middlename, 0, 1) . '. ' . Auth::user()->lastname }}</span> </td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td class="text-center" style="border: none; font-weight: normal;"> <span>{{ Auth::user()->position }}</span> </td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;" width="15%">Approved by:</td>
            <td style="border: none;"></td>
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td class="text-center" style="border: none; font-weight: bold; border-bottom: 1px solid black;"> <span>ANDREW P. PATRIMONIO</span> </td>   
        </tr>
        <tr>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td class="text-center" style="border: none; font-weight: normal;"> Information Technology Officer II </td>
        </tr>
    </table>

</body>
</html>