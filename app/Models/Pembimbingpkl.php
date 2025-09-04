<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembimbingpkl extends Model
{
    protected $table = "pembimbing_pkl";
    protected $fillable = ['nama_pembimbing_pkl','email','nomor_telepon'];
}
