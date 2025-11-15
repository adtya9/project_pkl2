<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = "siswa";
    protected $primaryKey = "id_siswa";
    public $timestamps = false;
    protected $fillable = ['nis','nama','email','nomor_telepon','jenis_kelamin','id_sekolah','id_jurusan'];

    public function sekolah() {
        return $this->belongsTo(Sekolah::class,'id_sekolah');
    }

    public function jurusan() {
        return $this->belongsTo(Jurusan::class,'id_jurusan');
    }

    public function penempatanpkl()
{
    return $this->hasMany(Penempatanpkl::class, 'id_siswa', 'id_siswa');
}

}
