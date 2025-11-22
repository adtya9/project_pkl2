<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;    
use App\Models\Jurusan;

class JurusanUserController extends Controller
{
     public function index()
    {
        $data = Jurusan::paginate(10);
        return view('user.jurusan.index', compact('data'));
    }
}
