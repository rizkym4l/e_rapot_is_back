<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Academic Progress Report</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 20px;
        }

        h1 {
            color: #007bff;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .subtitle {
            font-size: 18px;
            color: #6c757d;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 20px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #007bff;
            color: #ffffff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #e9ecef;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            color: #6c757d;
            font-size: 14px;
        }

        @media print {
            body {
                background-color: #ffffff;
            }

            .container {
                box-shadow: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Monthly Academic Progress Report</h1>
            <p class="subtitle">{{ $month }} {{ $year }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Previous Grade</th>
                    <th>Current Grade</th>
                    <th>Modified By</th>
                    <th>Last Updated</th>
                    <th>created_by</th>
                </tr>
            </thead>
            <tbody>
                {{ $reportData }}
                @foreach ($reportData as $data)
                    <tr>
                        <td>{{ $data['siswa']['nama_lengkap'] }}</td>
                        <td>{{ $data['nilai_before'] }}</td>
                        <td>{{ $data['nilai_after'] }}</td>
                        <td>{{ $data['user']['name'] }}</td>
                        <td>{{ $data['updated_at'] }}</td>
                        <td>{{ $data['created_at'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p>This report is confidential and intended for academic purposes only.</p>
            <p>Generated on {{ date('F d, Y') }}</p>
        </div>
    </div>
</body>

</html>
