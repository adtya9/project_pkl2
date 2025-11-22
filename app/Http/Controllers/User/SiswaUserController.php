<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;    
use App\Models\Siswa;

class SiswaUserController extends Controller
{
     public function index()
    {
        $data = Siswa::paginate(10);
        return view('user.siswa.index', compact('data'));
    }
}
