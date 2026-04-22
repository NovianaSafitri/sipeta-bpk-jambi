<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('guests', function (Blueprint $table) {
        $table->id();
        $table->string('nik');
        $table->string('nama_lengkap');
        $table->string('asal_instansi');
        $table->text('alamat');
        $table->string('no_whatsapp');
        $table->string('keperluan');
        $table->string('pegawai_tujuan');
        $table->string('unit_kerja');
        $table->longText('foto_tamu'); // Untuk simpan hasil kamera
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
