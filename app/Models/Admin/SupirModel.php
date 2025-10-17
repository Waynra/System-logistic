<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupirModel extends Model
{
    use HasFactory;
    protected $table = "tbl_supir";
    protected $primaryKey = 'supir_id';
    protected $fillable = [
        'supir_kode',
        'supir_tgl',
        'supir_nama',
        'supir_asal',
        'supir_tujuan',
        'supir_tagihan',
        'supir_bayar',
        'supir_sisa',
        'supir_status'
    ];
}
