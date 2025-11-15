<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('siswa', function (Blueprint $table) {
        $table->id('id_siswa');
        $table->string('nis');
        $table->string('nama');
        $table->string('email');
        $table->string('nomor_telepon')->nullable();
        $table->char('jenis_kelamin', 1);
        $table->unsignedBigInteger('id_sekolah')->nullable();
        $table->unsignedBigInteger('id_jurusan')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
