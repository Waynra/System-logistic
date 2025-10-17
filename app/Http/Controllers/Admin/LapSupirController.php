<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SupirModel;
use App\Models\Admin\WebModel;
use Illuminate\Http\Request;
use PDF;
use Yajra\DataTables\DataTables;

class LapSupirController extends Controller
{
    public function index()
    {
        $data["title"] = "Lap Supir";
        return view('Admin.Laporan.Supir.index', $data);
    }

    public function print(Request $request)
    {
        if ($request->tglawal) {
            $data['data'] = SupirModel::whereBetween('supir_tgl', [$request->tglawal, $request->tglakhir])->orderBy('supir_id', 'DESC')->get();
        } else {
            $data['data'] = SupirModel::orderBy('supir_id', 'DESC')->get();
        }

        $data["title"] = "Print Data Supir";
        $data['web'] = WebModel::first();
        $data['tglawal'] = $request->tglawal;
        $data['tglakhir'] = $request->tglakhir;
        return view('Admin.Laporan.Supir.print', $data);
    }

    public function pdf(Request $request)
    {
        if ($request->tglawal) {
            $data['data'] = SupirModel::whereBetween('supir_tgl', [$request->tglawal, $request->tglakhir])->orderBy('supir_id', 'DESC')->get();
        } else {
            $data['data'] = SupirModel::orderBy('supir_id', 'DESC')->get();
        }

        $data["title"] = "PDF Data Supir";
        $data['web'] = WebModel::first();
        $data['tglawal'] = $request->tglawal;
        $data['tglakhir'] = $request->tglakhir;
        $pdf = PDF::loadView('Admin.Laporan.Supir.pdf', $data)->setPaper('a4', 'landscape');
        
        if($request->tglawal){
            return $pdf->download('lap-supir-'.$request->tglawal.'-'.$request->tglakhir.'.pdf');
        }else{
            return $pdf->download('lap-supir-semua-tanggal.pdf');
        }
        
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            if ($request->tglawal == '') {
                $data = SupirModel::orderBy('supir_id', 'DESC')->get();
            } else {
                $data = SupirModel::whereBetween('supir_tgl', [$request->tglawal, $request->tglakhir])->orderBy('supir_id', 'DESC')->get();
            }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('status', function ($row) {
                    if ($row->supir_status == 'Belum Lunas') {
                        $status = '<span class="badge bg-dark">Belum Lunas</span>';
                    } else if ($row->supir_status == 'Lunas') {
                        $status = '<span class="badge bg-success">Lunas</span>';
                    } else {
                        $status = '-';
                    }

                    return $status;
                })
                ->addColumn('tagihan', function ($row) {
                    $tagihan = $row->supir_tagihan == '' ? '-' : 'Rp ' . number_format($row->supir_tagihan, 0);

                    return $tagihan;
                })
                ->addColumn('bayar', function ($row) {
                    $bayar = $row->supir_bayar == '' ? '-' : 'Rp ' . number_format($row->supir_bayar, 0);

                    return $bayar;
                })
                ->addColumn('sisa', function ($row) {
                    $sisa = $row->supir_sisa == '' ? '-' : 'Rp ' . number_format($row->supir_sisa, 0);

                    return $sisa;
                })
                ->rawColumns(['status', 'tagihan', 'bayar', 'sisa'])->make(true);
        }
    }

}
