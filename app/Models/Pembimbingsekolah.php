<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembimbingsekolah extends Model
{
    protected $table = "pembimbing_sekolah";
    protected $primaryKey = "id_pembimbing_sekolah";
    public $timestamps = false;

    protected $fillable = [
        'nama_pembimbing_sekolah',
        'email',
        'nomor_telepon',
        'id_sekolah'
    ];

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'id_sekolah');
    }

    public function penempatanpkl()
    {
        return $this->hasMany(Penempatanpkl::class, 'id_pembimbing_sekolah', 'id_pembimbing_sekolah');
    }
}
