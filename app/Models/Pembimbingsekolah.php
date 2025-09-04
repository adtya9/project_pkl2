<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembimbingsekolah extends Model
{
    protected $table = "pembimbing_sekolah";
    protected $fillable = ['nama_pembimbing_sekolah','email','nomor_telepon'];

    public function sekolah() {
        return $this->belongsTo(Sekolah::class);
        
    }
}
