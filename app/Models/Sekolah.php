<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table = "sekolah";
    protected $primaryKey = "id_sekolah";
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'nama_sekolah',
        'alamat_sekolah'
    ];

    public function pembimbing()
    {
        return $this->hasMany(Pembimbingsekolah::class, 'id_pembimbing_sekolah');
    }
}
