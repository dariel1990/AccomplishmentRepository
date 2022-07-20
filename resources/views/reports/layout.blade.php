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
        thead  td, th {
            border: 1px solid black;
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
    @include('reports.header')

    @yield('content')
</body>
</html>