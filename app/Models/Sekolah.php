<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table =  "sekolah";
    protected $primaryKey = 'id_sekolah';
    public $timestamps = false;
    protected $fillable = ['nama_sekolah','alamat_sekolah'];

      public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_sekolah');
    }

    
    public function pembimbingSekolah()
    {
        return $this->hasMany(Pembimbingsekolah::class, 'id_sekolah');
    }

    
    public function penempatanpkl()
    {
        return $this->hasMany(Penempatanpkl::class, 'id_sekolah');
    }
}

