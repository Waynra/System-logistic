<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\JurnalPengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class JurnalPengeluaranController extends Controller
{
    public function index()
    {
        $title = "Jurnal Pengeluaran";
        $totalPengeluaran = JurnalPengeluaran::sum('jumlah_pengeluaran');
        return view('Admin.JurnalPengeluaran.index', compact('title', 'totalPengeluaran'));
    }

    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = JurnalPengeluaran::orderBy('created_at', 'asc')->get();
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
            'tanggal_pengeluaran' => 'required|date',
            'no_manifest' => 'required|string',
            'deskripsi' => 'required|string',
            'jumlah_pengeluaran' => 'required|numeric',
            'status' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }

        JurnalPengeluaran::create($request->all());

        return response()->json(['success' => 'Data pengeluaran berhasil ditambahkan']);
    }

    public function update(Request $request, JurnalPengeluaran $jurnalPengeluaran)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_pengeluaran' => 'required|date',
            'no_manifest' => 'required|string',
            'deskripsi' => 'required|string',
            'jumlah_pengeluaran' => 'required|numeric',
            'status' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()]);
        }

        $jurnalPengeluaran->update($request->all());

        return response()->json(['success' => 'Data pengeluaran berhasil diupdate']);
    }

    public function destroy(JurnalPengeluaran $jurnalPengeluaran)
    {
        $jurnalPengeluaran->delete();
        return response()->json(['success' => 'Data pengeluaran berhasil dihapus']);
    }

    public function print(Request $request)
    {
        $data = JurnalPengeluaran::all();
        $title = "Laporan Pengeluaran";
        $web = (object) [
            'web_deskripsi' => 'Deskripsi Web',
            'web_nama' => 'Nama Web',
            'web_logo' => 'logo.png',
        ];

        return view('Admin.JurnalPengeluaran.print', compact('data', 'title', 'web'));
    }
}
