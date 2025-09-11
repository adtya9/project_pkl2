<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penempatanpkl extends Model
{
    protected $table = "penempatan";
    protected $primarKey = "id_penempatan";
    public $timestamps = false;
    protected $fillable = ['id_siswa','id_bagian','id_pembimbing_pkl','id_pembimbing_sekolah','tanggal_mulai','tanggal_selesai'];

    public function siswa(){
        return $this->belongsTo(Siswa::class);
    }

    public function bagianpkl() {
        return $this->belongsTo(Bagianpkl::class);
    }

    public function pembimbingpkl() {
        return $this->belongsTo(Pembimbingpkl::class);
    }

    public function pembimbingsekolah() {
        return $this->belongsTo(Pembimbingsekolah::class);
    }
}
