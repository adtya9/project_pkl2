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
        Schema::create('pembimbing_sekolah', function (Blueprint $table) {
            $table->id('id_pembimbing_sekolah');
            $table->string('nama_pembimbing_sekolah');
            $table->string('email')->unique();
            $table->string('nomor_telepon')->nullable();
            $table->unsignedBigInteger('id_sekolah')->nullable();
            $table->foreign('id_sekolah')->references('id_sekolah')->on('sekolah')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembimbing_sekolah');
    }
};
