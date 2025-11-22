<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;    
use App\Models\Bagianpkl;

class BagianpklUserController extends Controller
{
    public function index()
    {
        $data = Bagianpkl::paginate(10);
        return view('user.bagianpkl.index', compact('data'));
    }
}
