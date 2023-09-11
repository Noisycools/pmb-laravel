<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->date('tanggal_pendaftaran');
            $table->enum('status', ['Diterima', 'Ditolak', 'Proses']);
            $table->text('data_pendaftaran'); // Kolom ini bisa berisi berkas pendaftaran atau data lainnya
            $table->text('keterangan')->nullable(); // Kolom ini opsional
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
        Schema::dropIfExists('pendaftaran');
    }
}
