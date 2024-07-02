<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Peminjaman Barang</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        header {
            text-align: center;
            margin-bottom: 10px;
        }

        h1 {
            font-size: 2rem;
            color: #343a40;
            font-weight: bold;
            border-bottom: 2px solid #343a40;
            display: inline-block;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <header>
        <h2>Laporan Jemaat HKBP Purbasari</h2>
    </header>
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Umur</th>
                        <th>Status Baptis</th>
                        <th>Status Sidi</th>
                        <th>Status Pernikahan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            @php
                                $tanggal_lahir = \Carbon\Carbon::parse($item->tanggal_lahir);
                                $umur = $tanggal_lahir->diffInYears(\Carbon\Carbon::now());
                            @endphp
                            <td>{{ $umur }}</td>
                            @if ($item->baptis)
                                <td>{{ $item->baptis->status_baptis }}</td>
                            @else
                                <td>Belum Baptis</td>
                            @endif
                            @if ($item->sidi)
                                <td>{{ $item->sidi->status_sidi }}</td>
                            @else
                                <td>Belum Sidi</td>
                            @endif
                            @if ($item->menikah)
                                <td>{{ $item->menikah->status_menikah }}</td>
                            @else
                                <td>Belum Menikah</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
