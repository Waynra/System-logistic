<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Armada;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ArmadaController extends Controller
{
    public function index()
    {
        $title = "Data Armada";
        $hakTambah = 1; // Set this dynamically based on your logic
        return view('Admin.Armada.index', compact('title', 'hakTambah'));
    }

    public function getArmada(Request $request)
    {
        if ($request->ajax()) {
            $data = Armada::orderBy('created_at', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="edit btn btn-primary btn-sm" onclick="editArmada('.$row->id.')">Edit</a>';
                    $btn .= ' <a href="javascript:void(0)" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm" onclick="deleteArmada('.$row->id.')">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_armada' => 'required|string|max:255',
            'jenis_kendaraan' => 'required|string|max:255',
            'no_polisi' => 'required|string|max:255',
            'kapasitas_muatan' => 'required|numeric',
            'berat_maksimal' => 'required|numeric',
            'status' => 'required|string',
        ]);

        Armada::create($request->all());

        return response()->json(['success' => 'Armada berhasil ditambahkan']);
    }

    public function update(Request $request, Armada $armada)
    {
        $request->validate([
            'nama_armada' => 'required|string|max:255',
            'jenis_kendaraan' => 'required|string|max:255',
            'no_polisi' => 'required|string|max:255',
            'kapasitas_muatan' => 'required|numeric',
            'berat_maksimal' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $armada->update($request->all());

        return response()->json(['success' => 'Armada berhasil diupdate']);
    }

    public function destroy(Armada $armada)
    {
        $armada->delete();
        return response()->json(['success' => 'Armada berhasil dihapus']);
    }
}
