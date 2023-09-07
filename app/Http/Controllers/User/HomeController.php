<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $siswa = Siswa::where('user_id', Auth::user()->id)->get();
        $isRegistered = $siswa->pluck('is_registered')->first();
        
        return view('dashboard.user.home',compact('siswa','isRegistered'));
    }
}
