<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Admin\AksesModel;
use App\Models\Admin\SupirModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\DataTables;

class SupirController extends Controller
{
    public function index()
    {
        $data["title"] = "Supir";
        $data["hakTambah"] = AksesModel::leftJoin('tbl_menu', 'tbl_menu.menu_id', '=', 'tbl_akses.menu_id')->where(array('tbl_akses.role_id' => Session::get('user')->role_id, 'tbl_menu.menu_judul' => 'Supir', 'tbl_akses.akses_type' => 'create'))->count();
        return view('Admin.Supir.index', $data);
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = SupirModel::orderBy('supir_id', 'DESC')->get();
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
                ->addColumn('action', function ($row) {
                    $array = array(
                        "supir_id" => $row->supir_id,
                        "supir_nama" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $row->supir_nama)),
                        "supir_tgl" => $row->supir_tgl,
                        "supir_asal" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $row->supir_asal)),
                        "supir_tujuan" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $row->supir_tujuan)),
                        "supir_tagihan" => $row->supir_tagihan,
                        "supir_bayar" => $row->supir_bayar,
                        "supir_status" => trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $row->supir_status)),
                    );
                    $button = '';
                    $hakEdit = AksesModel::leftJoin('tbl_menu', 'tbl_menu.menu_id', '=', 'tbl_akses.menu_id')->where(array('tbl_akses.role_id' => Session::get('user')->role_id, 'tbl_menu.menu_judul' => 'Supir', 'tbl_akses.akses_type' => 'update'))->count();
                    $hakDelete = AksesModel::leftJoin('tbl_menu', 'tbl_menu.menu_id', '=', 'tbl_akses.menu_id')->where(array('tbl_akses.role_id' => Session::get('user')->role_id, 'tbl_menu.menu_judul' => 'Supir', 'tbl_akses.akses_type' => 'delete'))->count();
                    if ($hakEdit > 0 && $hakDelete > 0) {
                        $button .= '
                        <div class="g-2">
                        <a class="btn modal-effect text-primary btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Umodaldemo8" data-bs-toggle="tooltip" data-bs-original-title="Edit" onclick=update(' . json_encode($array) . ')><span class="fe fe-edit text-success fs-14"></span></a>
                        <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=hapus(' . json_encode($array) . ')><span class="fe fe-trash-2 fs-14"></span></a>
                        </div>
                        ';
                    } else if ($hakEdit > 0 && $hakDelete == 0) {
                        $button .= '
                        <div class="g-2">
                            <a class="btn modal-effect text-primary btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Umodaldemo8" data-bs-toggle="tooltip" data-bs-original-title="Edit" onclick=update(' . json_encode($array) . ')><span class="fe fe-edit text-success fs-14"></span></a>
                        </div>
                        ';
                    } else if ($hakEdit == 0 && $hakDelete > 0) {
                        $button .= '
                        <div class="g-2">
                        <a class="btn modal-effect text-danger btn-sm" data-bs-effect="effect-super-scaled" data-bs-toggle="modal" href="#Hmodaldemo8" onclick=hapus(' . json_encode($array) . ')><span class="fe fe-trash-2 fs-14"></span></a>
                        </div>
                        ';
                    } else {
                        $button .= '-';
                    }
                    return $button;
                })
                ->rawColumns(['action', 'status', 'tagihan', 'bayar', 'sisa'])->make(true);
        }
    }

    public function proses_tambah(Request $request)
    {
        $kode = Helper::generateKodeSupir();
        $sisa = intval($request->tagihan) - intval($request->bayar);

        //insert data
        SupirModel::create([
            'supir_kode' => $kode,
            'supir_tgl' => $request->tgl,
            'supir_nama' => $request->nama,
            'supir_asal'  => $request->asal,
            'supir_tujuan'  => $request->tujuan,
            'supir_tagihan' => $request->tagihan,
            'supir_bayar' => $request->bayar,
            'supir_sisa'  => $sisa,
            'supir_status'  => $request->status,
        ]);

        return response()->json(['success' => 'Berhasil']);
    }

    public function proses_ubah(Request $request, SupirModel $supir)
    {
        $sisa = intval($request->tagihan) - intval($request->bayar);

        //update data
        $supir->update([
            'supir_tgl' => $request->tgl,
            'supir_nama' => $request->nama,
            'supir_asal'  => $request->asal,
            'supir_tujuan'  => $request->tujuan,
            'supir_tagihan' => $request->tagihan,
            'supir_bayar' => $request->bayar,
            'supir_sisa'  => $sisa,
            'supir_status'  => $request->status,
        ]);

        return response()->json(['success' => 'Berhasil']);
    }

    public function proses_hapus(Request $request, SupirModel $supir)
    {
        //delete
        $supir->delete();

        return response()->json(['success' => 'Berhasil']);
    }
}
