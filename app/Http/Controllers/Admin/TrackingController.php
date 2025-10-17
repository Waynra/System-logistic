<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tracking;

class TrackingController extends Controller
{
    public function index()
    {
        $title = 'Tracking Barang';
        return view('admin.tracking.index', compact('title'));
    }

    public function track(Request $request)
    {
        $kode_barang = $request->input('kode_barang');

        $tracking = Tracking::where('kode_barang', $kode_barang)->orderBy('created_at', 'asc')->get();

        if ($tracking->isEmpty()) {
            return response()->json(['tracking' => [], 'message' => 'Tidak ada data pelacakan untuk kode barang ini.']);
        }

        return response()->json(['tracking' => $tracking]);
    }
}
