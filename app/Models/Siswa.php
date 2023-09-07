<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function sekolah()
    {
        return $this->hasOne(Sekolah::class, 'siswa_id');
    }

    public function keluarga()
    {
    return $this->hasOne(Keluarga::class);
    }
    

    protected $fillable = [
        'user_id','no_registrasi','nama_lengkap','jenis_kelamin','agama','tempat_lahir','tanggal_lahir','alamat','pas_foto','bukti_pembayaran','is_registered','status_pendaftaran'
    ];
}
