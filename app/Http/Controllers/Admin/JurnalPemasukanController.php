<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\JurnalPemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class JurnalPemasukanController extends Controller
{
    public function index()
    {
        $title = "Jurnal Pemasukan";
        $totalPemasukan = JurnalPemasukan::sum('jumlah_pemasukan');
        return view('Admin.JurnalPemasukan.index', compact('title', 'totalPemasukan'));
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = JurnalPemasukan::orderBy('created_at', 'asc')->get();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <a href="javascript:void(0)" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_pemasukan' => 'required|date',
            'no_manifest' => 'required|string',
            'deskripsi' => 'required|string',
            'jumlah_pemasukan' => 'required|numeric',
            'status' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        JurnalPemasukan::create($request->all());

        return response()->json(['success' => 'Data pemasukan berhasil ditambahkan']);
    }

    public function update(Request $request, JurnalPemasukan $jurnalPemasukan)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_pemasukan' => 'required|date',
            'no_manifest' => 'required|string',
            'deskripsi' => 'required|string',
            'jumlah_pemasukan' => 'required|numeric',
            'status' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $jurnalPemasukan->update($request->all());

        return response()->json(['success' => 'Data pemasukan berhasil diupdate']);
    }

    public function destroy(JurnalPemasukan $jurnalPemasukan)
    {
        $jurnalPemasukan->delete();
        return response()->json(['success' => 'Data pemasukan berhasil dihapus']);
    }

    public function print(Request $request)
    {
        $data = JurnalPemasukan::all();
        $title = "Laporan Pemasukan";
        $web = (object) [
            'web_deskripsi' => 'Deskripsi Web',
            'web_nama' => 'Nama Web',
            'web_logo' => 'logo.png',
        ];

        return view('Admin.JurnalPemasukan.print', compact('data', 'title', 'web'));
    }
}
