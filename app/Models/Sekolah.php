<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    protected $fillable = [
        'siswa_id','nisn', 'ijazah','skhun', 'tahun_skhun','tahun_lulus','asal_sekolah',
    ];
}
