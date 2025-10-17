<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArmadaTable extends Migration
{
    public function up()
    {
        Schema::create('armada', function (Blueprint $table) {
            $table->id();
            $table->string('nama_armada');
            $table->string('jenis_kendaraan');
            $table->string('no_polisi');
            $table->decimal('kapasitas_muatan', 8, 2);
            $table->decimal('berat_maksimal', 8, 2); // Pastikan kolom ini ada
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('armada');
    }
}
