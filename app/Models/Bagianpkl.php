<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bagianpkl extends Model
{
    protected $table =  "bagian";
    protected $primaryKey = "id_bagian";
    public $timestamps = false;
    protected $fillable = ['nama_bagian'];

      public function penempatanpkl()
{
    return $this->hasMany(Penempatanpkl::class, 'id_bagian', 'id_bagian');
}


}
