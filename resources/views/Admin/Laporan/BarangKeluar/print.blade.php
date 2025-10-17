<!DOCTYPE html>
<html lang="en">

<?php

use Carbon\Carbon;
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$web->web_deskripsi}}">
    <meta name="author" content="{{$web->web_nama}}">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- FAVICON -->
    @if($web->web_logo == '' || $web->web_logo == 'default.png')
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/assets/default/web/default.png')}}" />
    @else
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('storage/web/' . $web->web_logo)}}" />
    @endif

    <title>{{$title}}</title>

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

        .company-info {
            position: absolute;
            bottom: 10px;
            right: 10px;
            font-size: 10px;
            text-align: right;
        }

        .signature-box {
            position: absolute;
            bottom: 10px;
            left: 10px;
            width: 200px;
            height: 100px;
            border: 1px solid #000;
            padding: 10px;
        }

        .signature-box p {
            margin: 0;
            padding: 5px 0;
        }

    </style>

</head>

<body onload="window.print()">

    <center>
        @if($web->web_logo == '' || $web->web_logo == 'default.png')
        <img src="{{url('/assets/default/web/default.png')}}" width="80px" alt="">
        @else
        <img src="{{asset('storage/web/' . $web->web_logo)}}" width="80px" alt="">
        @endif
    </center>

    <center>
        <h1 class="font-medium">Laporan Barang Keluar</h1>
        @if($tglawal == '')
        <h4 class="font-medium">Semua Tanggal</h4>
        @else
        <h4 class="font-medium">{{Carbon::parse($tglawal)->translatedFormat('d F Y')}} - {{Carbon::parse($tglakhir)->translatedFormat('d F Y')}}</h4>
        @endif
    </center>

    <table border="1" id="table1">
        <thead>
            <tr>
                <th align="center" width="1%">NO</th>
                <th>TGL KELUAR</th>
                <th>KODE BRG KELUAR</th>
                <th>KODE BARANG</th>
                <th>BARANG</th>
                <th>JML KELUAR</th>
                <th>TUJUAN</th>
            </tr>
        </thead>
        <tbody>
            @php $no=1; @endphp
            @foreach($data as $d)
            <tr>
                <td align="center">{{$no++}}</td>
                <td>{{Carbon::parse($d->bk_tanggal)->translatedFormat('d F Y')}}</td>
                <td>{{$d->bk_kode}}</td>
                <td>{{$d->barang_kode}}</td>
                <td>{{$d->barang_nama}}</td>
                <td align="center">{{$d->bk_jumlah}}</td>
                <td>{{$d->bk_tujuan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="company-info">
        <p>PT. RENDEXINDO PRATAMA EKSPRESS</p>
        <p>JL. Manggarai Utara VI No. 13</p>
        <p>Kel. Manggarai Tebet</p>
        <p>Jakarta Selatan</p>
        <p>Phone: 021-83789524</p>
        <p>Fax: 021-8309458</p>
        <p>Email: harris@rendexindo.com</p>
        <p>URL: <a href="https://rendexindo.com">https://rendexindo.com</a></p>
    </div>

    <div class="signature-box">
        <p>Tanda Tangan Serah Terima:</p>
        <p>............................................</p>
    </div>

</body>

</html>
