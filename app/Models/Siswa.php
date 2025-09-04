<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = "siswa";
    protected $fillable = ['nis','nama','email','nomor_telepon','jenis_kelamin','id_sekolah','id_jurusan'];

    public function sekolah() {
        return $this->belongsTo(Sekolah::class);
    }

    public function jurusan() {
        return $this->belongsTo(Jurusan::class);
    }
}
