<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalPengeluaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal_pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pengeluaran');
            $table->string('no_manifest');
            $table->string('deskripsi');
            $table->decimal('jumlah_pengeluaran', 15, 2);
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
        Schema::dropIfExists('jurnal_pengeluarans');
    }
}
