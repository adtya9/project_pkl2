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
        // Cek dulu apakah tabel penempatan_pkl sudah ada
        if (!Schema::hasTable('penempatan_pkl')) {
            return;
        }

        Schema::table('penempatan_pkl', function (Blueprint $table) {
            if (!Schema::hasColumn('penempatan_pkl', 'id_sekolah')) {
                $table->unsignedBigInteger('id_sekolah')->nullable()->after('id_siswa');

                $table->foreign('id_sekolah')
                      ->references('id_sekolah')
                      ->on('sekolah')
                      ->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('penempatan_pkl')) {
            Schema::table('penempatan_pkl', function (Blueprint $table) {
                if (Schema::hasColumn('penempatan_pkl', 'id_sekolah')) {
                    $table->dropForeign(['id_sekolah']);
                    $table->dropColumn('id_sekolah');
                }
            });
        }
    }
};
