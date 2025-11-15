<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Penempatanpkl extends Model
{
    protected $table = "penempatan_pkl";
    protected $primaryKey = "id_penempatan";
    public $timestamps = false;
    protected $fillable = ['id_siswa','id_sekolah','id_jurusan','id_bagian','id_pembimbing_pkl','id_pembimbing_sekolah','tanggal_mulai','tanggal_selesai'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'id_sekolah', 'id_sekolah');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id_jurusan');
    }

    public function bagianpkl()
    {
        return $this->belongsTo(Bagianpkl::class, 'id_bagian', 'id_bagian');
    }

    public function pembimbingsekolah()
    {
        return $this->belongsTo(Pembimbingsekolah::class, 'id_pembimbing_sekolah', 'id_pembimbing_sekolah');
    }

    public function pembimbingpkl()
    {
        return $this->belongsTo(Pembimbingpkl::class, 'id_pembimbing_pkl', 'id_pembimbing_pkl');
    }

    

public function getTanggalMulaiAttribute($value)
{
    return Carbon::parse($value)->translatedFormat('j M Y');
}

public function getTanggalSelesaiAttribute($value)
{
    return Carbon::parse($value)->translatedFormat('j M Y');
}
}