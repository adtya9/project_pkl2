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
    Schema::table('penempatan_pkl', function (Blueprint $table) {
        $table->unsignedInteger('id_sekolah')->nullable()->after('id_siswa');

        $table->foreign('id_sekolah')
              ->references('id_sekolah')
              ->on('sekolah')
              ->onDelete('set null');
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
