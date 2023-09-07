<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Siswa;
use App\Models\Sekolah;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $siswaData = Siswa::with('sekolah')->get();

        $modifiedData = $siswaData->map(function ($item, $key) {
            return [
                $item->no_registrasi,
                $item->nama_lengkap,
                $item->jenis_kelamin,
                $item->agama,
                $item->no_hp,
                $item->tempat_lahir,
                $item->tanggal_lahir,
                $item->alamat,
                $item->sekolah->nisn,
                $item->sekolah->ijazah,
                $item->sekolah->skhun,
                $item->sekolah->tahun_skhun,
                $item->sekolah->tahun_lulus,
                $item->sekolah->asal_sekolah
            ];
        });

        return $modifiedData;

        $modifiedData = $siswaData->map(function ($item, $key) {
            unset($item->id);
            unset($item->user_id);
            unset($item->pas_foto);
            unset($item->is_registered);
            unset($item->created_at);
            unset($item->updated_at);
            return $item;
        });
    
        return $modifiedData;
    }
    public function headings(): array
    {
        return [
            'No Registrasi',
            'Nama Lengkap',
            'Jenis Kelamin',
            'Agama',
            'No hp',
            'Tempat lahir',
            'Tanggal lahir',
            'Alamat',
            'Nisn',
            'Ijazah',
            'Skhun',
            'Tahun Skhun',
            'Tahun Lulus',
            'Asal Sekolah'
           
        ];
    }
}
