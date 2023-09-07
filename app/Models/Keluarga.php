<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keluarga extends Model
{
    use HasFactory;

    public function keluarga()
    {
        return $this->hasOne(Keluarga::class);
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
   
    protected $fillable = [
        'siswa_id','status','nama_ayah','status_ayah','pek_ayah', 'pend_ayah','nama_ibu','status_ibu','pek_ibu','pend_ibu'
    ];
}
