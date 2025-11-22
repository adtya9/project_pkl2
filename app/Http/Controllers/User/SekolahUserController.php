<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;    
use App\Models\Sekolah;

class SekolahUserController extends Controller
{
     public function index()
    {
        $data = Sekolah::paginate(10);
        return view('user.sekolah.index', compact('data'));
    }
}
