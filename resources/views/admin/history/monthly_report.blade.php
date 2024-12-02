<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Academic Progress Report</title>
    <style>
        :root {
            --primary-color: #4a90e2;
            --secondary-color: #f5f7fa;
            --text-color: #333;
            --border-color: #e0e0e0;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--secondary-color);
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--primary-color);
        }

        h1 {
            color: var(--primary-color);
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        h2 {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .subtitle {
            font-size: 1.1rem;
            color: #666;
        }

        .table-container {
            overflow-x: auto;
            margin-bottom: 2rem;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 1rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        th {
            background-color: var(--primary-color);
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tbody tr:hover {
            background-color: #e9ecef;
        }

        footer {
            margin-top: 2rem;
            text-align: center;
            color: #666;
            font-size: 0.9rem;
        }

        @media screen and (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            th, td {
                padding: 0.75rem;
            }
        }

        @media print {
            body {
                background-color: #fff;
            }

            .container {
                box-shadow: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Monthly Academic Progress Report</h1>
            <p class="subtitle">{{ $month }} {{ $year }}</p>
        </header>

        <h2>New Data</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Current Grade</th>
                        <th>Modified By</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($newData as $data)
                        <tr>
                            <td>{{ $data['siswa']['nama_lengkap'] }}</td>
                            <td>{{ $data['nilai_after'] }}</td>
                            <td>{{ $data['user']['name'] }}</td>
                            <td>{{ $data['created_at'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h2>Updated Data</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Previous Grade</th>
                        <th>Current Grade</th>
                        <th>Modified By</th>
                        <th>Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($updatedData as $data)
                        <tr>
                            <td>{{ $data['siswa']['nama_lengkap'] }}</td>
                            <td>{{ $data['nilai_before'] }}</td>
                            <td>{{ $data['nilai_after'] }}</td>
                            <td>{{ $data['user']['name'] }}</td>
                            <td>{{ $data['updated_at'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <footer>
            <p>This report is confidential and intended for academic purposes only.</p>
            <p>Generated on {{ date('F d, Y') }}</p>
        </footer>
    </div>
</body>
</html>

