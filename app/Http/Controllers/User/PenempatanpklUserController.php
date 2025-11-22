<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;    
use App\Models\Penempatanpkl;

class PenempatanpklUserController extends Controller
{
     public function index()
    {
        $data = Penempatanpkl::paginate(10);
        return view('user.penempatanpkl.index', compact('data'));
    }
}
