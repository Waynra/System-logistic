<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armada extends Model
{
    use HasFactory;

    protected $table = 'armada';

    protected $fillable = [
        'nama_armada',
        'jenis_kendaraan',
        'no_polisi',
        'kapasitas_muatan',
        'berat_maksimal',
        'status',
    ];
}
