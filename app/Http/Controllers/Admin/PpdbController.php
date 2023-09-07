<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ppdb;
use Carbon\Carbon;

class PpdbController extends Controller
{
   public function index(){
    $ppdb = Ppdb::first();

    return view('dashboard.admin.pengaturan_ppdb',compact('ppdb'));    
   } 
   
   public function update(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        Ppdb::first()->update($request->all());

        return redirect()->back()->with('success', 'Pengaturan waktu PPDB berhasil diperbarui.');
    }
}
