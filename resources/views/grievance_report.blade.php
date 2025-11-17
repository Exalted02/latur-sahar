<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Grievance Report</title>
    <style>
        /*body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }*/
		@font-face {
			font-family: "noto_deva";
			src: url("{{ public_path('fonts/noto/static/NotoSansDevanagari-Regular.ttf') }}") format("truetype");
		}
		body {
			font-family: 'noto_deva', sans-serif !important;
            font-size: 12px;
		}
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #eeeeee;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        h2 {
            text-align: center;
            color: #0b2b57;
        }
    </style>
</head>
<body>
    <h2>Grievance Report</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Reg. No</th>
                <th>Issue Description</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grievances as $index => $g)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $g->registration_no }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($g->issue_description, 60) }}</td>
                    <td>
                        {{ $g->status == 1 ? 'Pending' : ($g->status == 2 ? 'Resubmit' : 'Solved') }}
                    </td>
                    <td>{{ \Carbon\Carbon::parse($g->submitted_date)->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>