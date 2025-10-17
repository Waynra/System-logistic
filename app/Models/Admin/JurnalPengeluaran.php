<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalPengeluaran extends Model
{
    use HasFactory;

    protected $table = 'jurnal_pengeluarans';

    protected $fillable = [
        'tanggal_pengeluaran',
        'no_manifest',
        'deskripsi',
        'jumlah_pengeluaran',
        'status'
    ];
}
