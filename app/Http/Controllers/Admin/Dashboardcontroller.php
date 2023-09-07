<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Keluarga;
use App\Models\Sekolah;
class Dashboardcontroller extends Controller
{
    public function index(Request $request){
        $siswa = Siswa::count();
        $keluarga = Keluarga::count();
        $sekolah = Siswa::count();

        $filter = $request->input('filter', 'This Month');

        $startDate = now()->startOfMonth();
        $endDate = now();

        if ($filter === 'This Year') {
            $startDate = now()->startOfYear();
        }

        $registrations = Siswa::whereBetween('created_at', [$startDate, $endDate])
            ->get();

        return view('dashboard.admin.home',compact('siswa','keluarga','sekolah','registrations', 'filter'));
    }

    

    // public function keluarga(){
        
    //     return view('dashboard.admin.home',compact('keluarga'));
    // }
}
