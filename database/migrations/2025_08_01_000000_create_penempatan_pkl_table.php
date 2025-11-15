<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penempatan_pkl', function (Blueprint $table) {
            $table->id('id_penempatan');
            $table->unsignedBigInteger('id_siswa')->nullable();
            $table->unsignedBigInteger('id_sekolah')->nullable();
            $table->unsignedBigInteger('id_jurusan')->nullable();
            $table->unsignedBigInteger('id_bagian')->nullable();
            $table->unsignedBigInteger('id_pembimbing_sekolah')->nullable();
            $table->unsignedBigInteger('id_pembimbing_pkl')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->timestamps();

           
            $table->foreign('id_siswa')->references('id_siswa')->on('siswa')->onDelete('set null');
            $table->foreign('id_sekolah')->references('id_sekolah')->on('sekolah')->onDelete('set null');
            $table->foreign('id_jurusan')->references('id_jurusan')->on('jurusan')->onDelete('set null');
            $table->foreign('id_bagian')->references('id_bagian')->on('bagian')->onDelete('set null');
            $table->foreign('id_pembimbing_sekolah')->references('id_pembimbing_sekolah')->on('pembimbing_sekolah')->onDelete('set null');
            $table->foreign('id_pembimbing_pkl')->references('id_pembimbing_pkl')->on('pembimbing_pkl')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penempatan_pkl');
    }
};
