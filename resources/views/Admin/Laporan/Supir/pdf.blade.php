<!DOCTYPE html>
<html lang="en">

<?php

use App\Models\Admin\BarangkeluarModel;
use App\Models\Admin\BarangmasukModel;
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
    </style>

</head>

<body>

    <center>
        <h1 class="font-medium">Laporan Data Supir</h1>
        @if($tglawal == '')
        <h4 class="font-medium">Semua Tanggal</h4>
        @else
        <h4 class="font-medium">{{Carbon::parse($tglawal)->translatedFormat('d F Y')}} - {{Carbon::parse($tglakhir)->translatedFormat('d F Y')}}</h4>
        @endif
    </center>


    <table border="1" id="table1">
        <thead>
            <tr>
                <th>NO MANIFEST</th>
                <th>TGL</th>
                <th>SUPIR</th>
                <th>ASAL</th>
                <th>TUJUAN</th>
                <th>TAGIHAN</th>
                <th>BAYAR</th>
                <th>SISA</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <td>{{$d->supir_kode}}</td>
                <td>{{$d->supir_tgl}}</td>
                <td>{{$d->supir_nama}}</td>
                <td>{{$d->supir_asal}}</td>
                <td>{{$d->supir_tujuan}}</td>
                <td>{{$d->supir_tagihan == '' ? '-' : 'Rp ' . number_format($d->supir_tagihan, 0);}}</td>
                <td>{{$d->supir_bayar == '' ? '-' : 'Rp ' . number_format($d->supir_bayar, 0);}}</td>
                <td>{{$d->supir_sisa == '' ? '-' : 'Rp ' . number_format($d->supir_sisa, 0);}}</td>
                <td>{{$d->supir_status}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>