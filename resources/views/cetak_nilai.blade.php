<!DOCTYPE html>
<html>

<head>
    <title>Nilai Siswa</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 12px;
        }

        th,
        td {
            padding: 4px;
            text-align: center;
            border: 1px solid black;
        }

        th {
            background-color: #f2f2f2;
        }

        .header {
            margin-bottom: 20px;
            text-align: center;
        }

        .header h2 {
            margin: 0;
            padding: 0;
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .header p {
            margin: 0;
            padding: 2px 0;
            font-size: 14px;
        }

        .title {
            margin: 0;
            padding: 0;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Pemerintah Kabupaten Bogor</h2>
        <h2>Dinas Pendidikan</h2>
        <h2>SMP Islam Terpadu Al Kahfi</h2>
        <p>Jl. Ds. Srogol Kec. Cigombong Kab. Bogor, No Telp (0251) 8221625,</p>
        <p>Kode Pos 16110, NPSN: 20231072</p>
        <p>Email: smpitalkahfibogor@gmail.com</p>
    </div>

    <div class="title">Laporan Hasil Sumatif Tengah Semester Ganjil</div>
    <div class="title">Tahun Pelajaran {{ $tahun }}</div>

    <div class="header" style="text-align: left; margin-top: 20px;">
        <p><strong>Nama Sekolah:</strong> SMP Islam Terpadu Al Kahfi</p>
        <p><strong>Alamat:</strong> Jl. Desa Srogol</p>
        <p><strong>Nama Peserta Didik:</strong> {{ $siswa->nama_lengkap }}</p>
        <p><strong>No. Induk/NISN:</strong> {{ $siswa->nis }}</p>
        <p><strong>Kelas:</strong> {{ $nama_kelas }}</p>
        <p><strong>Semester:</strong> {{ $semester }}</p>
        <p><strong>Tahun Pelajaran:</strong> {{ $tahun }}</p>
    </div>

    <h3 style="text-align: center; font-weight: bold;">Capaian Kompetensi</h3>
    <table>
        <thead>
            <tr>
                @foreach ($data[0] as $header)
                    <th>{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $row)
                @if ($key > 0)
                    <tr>
                        <td>{{ $key }}</td>
                        <td style=" text-align: start;">{{ $row['mapel_id'] }}</td>
                        @foreach ($sap as $n)
                            <td>{{ $row[$n->name] ?? '-' }}</td>
                        @endforeach
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</body>

</html>
