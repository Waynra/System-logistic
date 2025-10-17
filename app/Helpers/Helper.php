<?php

namespace App\Helpers;

use App\Models\Admin\SupirModel;

class Helper
{
    public static function generateKodeSupir()
    {
        $cekNoUrut = SupirModel::whereYear('created_at', date("Y"))->orderBy('supir_id', 'DESC')->first();
        $urut = '';
        if ($cekNoUrut != null) {
            $exp = explode('-', $cekNoUrut->supir_kode);
            $urut = str_pad((intval($exp[1]) + 1), 5, '0', STR_PAD_LEFT);
        } else {
            $urut = '00001';
        }
        $kode = date("y").'-' . $urut;
        return $kode;
    }
}
