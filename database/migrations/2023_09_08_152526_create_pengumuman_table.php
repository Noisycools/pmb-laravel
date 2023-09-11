<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengumumanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pengumuman');
            $table->text('daftar_mahasiswa_diterima'); // Daftar mahasiswa yang diterima dalam format tertentu
            $table->text('daftar_mahasiswa_ditolak'); // Daftar mahasiswa yang ditolak dalam format tertentu
            $table->text('informasi_tambahan')->nullable(); // Informasi tambahan jika diperlukan
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
        Schema::dropIfExists('pengumuman');
    }
}
