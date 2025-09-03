<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKL extends Model
{
    use HasFactory;

    protected $table = 'pkls'; // nama tabel di database
    protected $fillable = ['nama', 'alamat', 'jurusan']; // kolom yang bisa diisi
}
