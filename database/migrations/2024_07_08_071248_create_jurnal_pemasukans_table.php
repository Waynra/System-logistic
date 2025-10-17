<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalPemasukansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal_pemasukans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pemasukan');
            $table->string('no_manifest');
            $table->string('deskripsi');
            $table->decimal('jumlah_pemasukan', 15, 2);
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnal_pemasukans');
    }
}
