<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalPemasukan extends Model
{
    use HasFactory;

    protected $table = 'jurnal_pemasukans';

    protected $fillable = [
        'tanggal_pemasukan',
        'no_manifest',
        'deskripsi',
        'jumlah_pemasukan',
        'status'
    ];
}
