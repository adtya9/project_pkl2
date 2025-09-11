<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembimbingpkl extends Model
{
    protected $table = "pembimbing_pkl";
    protected $primaryKey = "id_pembimbing_pkl";
    public $timestamps = false;
    protected $fillable = ['nama_pembimbing_pkl','email','nomor_telepon'];
}
