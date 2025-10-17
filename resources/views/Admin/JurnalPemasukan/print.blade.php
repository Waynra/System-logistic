<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $web->web_deskripsi }}">
    <meta name="author" content="{{ $web->web_nama }}">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- FAVICON -->
    @if($web->web_logo == '' || $web->web_logo == 'default.png')
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/assets/default/web/default.png') }}" />
    @else
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/web/' . $web->web_logo) }}" />
    @endif

    <title>{{ $title }}</title>

    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        #table1 {
            border-collapse: collapse;
            width: 100%;
            margin-top: 32px;
        }

        #table1 td,
        #table1 th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table1 th {
            padding-top: 12px;
            padding-bottom: 12px;
            color: black;
            font-size: 12px;
        }

        #table1 td {
            font-size: 11px;
        }

        .font-medium {
            font-weight: 500;
        }

        .font-bold {
            font-weight: 600;
        }

        .d-2 {
            display: flex;
            align-items: flex-start;
            margin-top: 32px;
        }
    </style>

</head>

<body onload="window.print()">

    <center>
        @if($web->web_logo == '' || $web->web_logo == 'default.png')
        <img src="{{ url('/assets/default/web/default.png') }}" width="80px" alt="">
        @else
        <img src="{{ asset('storage/web/' . $web->web_logo) }}" width="80px" alt="">
        @endif
    </center>

    <center>
        <h1 class="font-medium">Laporan Pemasukan</h1>
    </center>

    <table border="1" id="table1">
        <thead>
            <tr>
                <th align="center" width="1%">NO</th>
                <th>TGL PEMASUKAN</th>
                <th>NO MANIFEST</th>
                <th>DESKRIPSI</th>
                <th>JUMLAH PEMASUKAN</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($data as $d)
            <tr>
                <td align="center">{{ $no++ }}</td>
                <td>{{ \Carbon\Carbon::parse($d->tanggal_pemasukan)->translatedFormat('d F Y') }}</td>
                <td>{{ $d->no_manifest }}</td>
                <td>{{ $d->deskripsi }}</td>
                <td align="center">{{ number_format($d->jumlah_pemasukan, 2) }}</td>
                <td>{{ $d->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
