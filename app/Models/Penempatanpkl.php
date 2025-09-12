<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penempatanpkl extends Model
{
    protected $table = "penempatan_pkl";
    protected $primarKey = "id_penempatan";
    public $timestamps = false;
    protected $fillable = ['id_siswa','id_bagian','id_pembimbing_pkl','id_pembimbing_sekolah','tanggal_mulai','tanggal_selesai'];

    public function siswa(){
        return $this->belongsTo(Siswa::class,'id_siswa');
    }

    public function bagianpkl() {
        return $this->belongsTo(Bagianpkl::class,'id_bagian');
    }

    public function pembimbing_pkl() {
        return $this->belongsTo(Pembimbingpkl::class,'id_pembimbing_pkl');
    }

    public function pembimbing_sekolah() {
        return $this->belongsTo(Pembimbingsekolah::class,'id_pembimbing_sekolah');
    }
}
