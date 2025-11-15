<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penempatan_pkl', function (Blueprint $table) {
            $table->unsignedBigInteger('id_sekolah')->after('id_siswa')->nullable();

            // optional, kalau mau kasih relasi ke tabel sekolah
            $table->foreign('id_sekolah')->references('id_sekolah')->on('sekolah')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('penempatan_pkl', function (Blueprint $table) {
            $table->dropForeign(['id_sekolah']);
            $table->dropColumn('id_sekolah');
        });
    }
};
