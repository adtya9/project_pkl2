<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;    
use App\Models\Pembimbingpkl;

class PembimbingpklUserController extends Controller
{
     public function index()
    {
        $data = Pembimbingpkl::paginate(10);
        return view('user.pembimbingpkl.index', compact('data'));
    }
}
