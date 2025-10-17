<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingsTable extends Migration
{
    public function up()
    {
        Schema::create('trackings', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->timestamp('sampai_tujuan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trackings');
    }
}
