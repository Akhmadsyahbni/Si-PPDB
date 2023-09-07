<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Ppdb;
use Carbon\Carbon;
class LandingController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('sekolah')->get();
         // Ambil nilai end_date dari database PPDB
        
        // Ambil nilai end_date dari database PPDB
        $ppdb = Ppdb::first();
        $end_date = $ppdb ? $ppdb->end_date : null;

        // Hitung sisa waktu dalam detik antara tanggal saat ini dan end_date
        $countdown_seconds = 0;
        if ($end_date) {
            $current_date = Carbon::now();
            $countdown_seconds = $current_date->diffInSeconds($end_date, false);
             // Hitung data countdown untuk ditampilkan di view
             $countdown = [
                'days' => floor($countdown_seconds / (3600 * 24)),
                'hours' => floor(($countdown_seconds % (3600 * 24)) / 3600),
                'minutes' => floor(($countdown_seconds % 3600) / 60),
                'seconds' => $countdown_seconds % 60,
            ];
        }
 
        return view('landing.index',compact('siswa','countdown','countdown_seconds','ppdb'));
    }
}
