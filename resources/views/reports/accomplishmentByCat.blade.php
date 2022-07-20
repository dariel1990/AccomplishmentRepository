<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accomplishment Report CY {{ Carbon\Carbon::parse($printFrom)->format('Y') }}</title>
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

        thead  th {
            border: 1px solid black;
            border-spacing: 0px;
            padding-top: 5px;
            padding-bottom: 5px;
            font-size: 16px;
        }

        tbody  td, th {
            border: 1px solid black;
            border-spacing: 0px;
            padding-top: 5px;
            padding-bottom: 5px;
            font-size: 16px;
        }
        tfoot  th {
            border: 1px solid black;
            border-spacing: 0px;
            padding-top: 5px;
            padding-bottom: 5px;
            font-size: 16px;
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
                <h3 class="text-center" style="margin-top: 0; margin-bottom: 0;">Accomplishment Report CY {{ Carbon\Carbon::parse($printFrom)->format('Y') }}</h3>
                <h4 class="text-center" style="margin-top: 0; margin-bottom: 0; font-weight: normal;">{{ Carbon\Carbon::parse($printFrom)->format('M d, Y') }} - {{ Carbon\Carbon::parse($printTo)->format('M d, Y') }}</h4> 
            </td>
            <td style="border: none;"></td>
        </tr>
    </table>
    <div style="margin-bottom: 30px; margin-top: 30px;"></div>
    
    <div style="margin-bottom: 30px; margin-top: 30px;"></div>  

    <h3>Summary:</h3>
    <table width="100%" style="border-collapse:collapse;" cellpadding="10">    
        <thead>
            <tr>
                <th>PADMO-ITU PERSONNEL</th>
                <th>Number of Services Provided</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                @php 
                        $summaryByEmployees = Illuminate\Support\Facades\DB::table('accomplishments')
                                    ->selectRaw("categories.description, COUNT('accomplishments.*') as services")
                                    ->whereBetween('date_acted', [$printFrom, $printTo])
                                    ->where('accomplishments.user_id', $employee->id)
                                    ->join('categories', 'categories.id', '=', 'accomplishments.category')
                                    ->groupBy('categories.description')
                                    ->get();
                        $countAccomplishment = App\Models\Accomplishments::where('user_id',  $employee->id)->whereBetween('date_acted', [$printFrom, $printTo])->count();
                    @endphp
                <tr>
                    <td width="65%" style="padding-left: 35px;">{{ $employee->lastname . ', ' . $employee->firstname . ' ' . substr($employee->middlename, 0, 1) }}</td>
                    <td width="35%" class="text-center">{{ $countAccomplishment }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>TOTAL SERVICES PROVIDED</th>
                <th>{{ $countAllBetween }}</th>
            </tr>
        </tfoot>
    </table>

    <h4>The list includes:</h4>

    @foreach($employees as $employee)
        @php 
                $summaryByEmployees = Illuminate\Support\Facades\DB::table('accomplishments')
                            ->selectRaw("categories.description, COUNT('accomplishments.*') as services")
                            ->whereBetween('date_acted', [$printFrom, $printTo])
                            ->where('accomplishments.user_id', $employee->id)
                            ->join('categories', 'categories.id', '=', 'accomplishments.category')
                            ->groupBy('categories.description')
                            ->get();
                $countAccomplishment = App\Models\Accomplishments::where('user_id',  $employee->id)->whereBetween('date_acted', [$printFrom, $printTo])->count();
            @endphp
        
        <table width="90%" style="border-collapse:collapse; margin-left:50px; margin-bottom:20px" cellpadding="10">
            <tbody>
                <tr>
                    <td colspan="2">
                        <h4 style="padding: 0px; margin:0px">
                            {{ $employee->lastname . ', ' . $employee->firstname . ' ' . substr($employee->middlename, 0, 1) }}
                        </h4>
                        </td>
                </tr>
                <tr>
                    <th width="65%">Accomplishment</th>
                    <th width="35%">Number of Services Provided</th>
                </tr>
                @foreach($summaryByEmployees as $summaryByEmployee)
                    <tr>
                        <td>{{ $summaryByEmployee->description }}</td>
                        <td class="text-center">{{ $summaryByEmployee->services }}</td>
                    </tr>
                @endforeach
                <tr>
                    <th class="text-right">TOTAL => </th>
                    <th>{{ $countAccomplishment }}</th>
                </tr>
            </tbody>
        </table>
    @endforeach
</body>
</html>