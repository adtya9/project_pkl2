<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = "jurusan";
    protected $primaryKey = "id_jurusan";   
    public $timestamps = false;
    protected $fillable = ['nama_jurusan']; 

    public function siswa()
{
    return $this->hasMany(Siswa::class, 'id_jurusan', 'id_jurusan');
}

}
