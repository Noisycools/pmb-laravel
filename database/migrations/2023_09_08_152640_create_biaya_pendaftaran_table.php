<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiayaPendaftaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biaya_pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_studi_id');
            $table->decimal('jumlah', 10, 2); // Jumlah biaya dalam desimal
            $table->date('batas_waktu_pembayaran');
            $table->string('metode_pembayaran');
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
        Schema::dropIfExists('biaya_pendaftaran');
    }
}
