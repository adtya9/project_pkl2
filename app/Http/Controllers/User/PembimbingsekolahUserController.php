<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;    
use App\Models\Pembimbingsekolah;

class PembimbingsekolahUserController extends Controller
{
     public function index()
    {
        $data = Pembimbingsekolah::paginate(10);
        return view('user.pembimbingsekolah.index', compact('data'));
    }
}
