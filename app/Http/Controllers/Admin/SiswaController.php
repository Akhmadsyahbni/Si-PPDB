<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Dompdf\Dompdf;
use PDF;
use App\Exports\SiswaExport; // Pastikan Anda memiliki export class yang sesuai
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::paginate(10);
        return view('dashboard.admin.siswa',compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return view ('dashboard.admin.siswa_detail',compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view ('dashboard.admin.siswa_edit',compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);

        $siswa->update([
            'nama_lengkap' => $request->input('nama_lengkap'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'agama' => $request->input('agama'),
            'no_hp' => $request->input('no_hp'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'alamat' => $request->input('alamat'),
        ]);

        if($siswa){
            return redirect()->route('admin.siswa.index')->with('success','Data Berhasil di Update!');
        }else{
            return redirect()->back()->with('success', 'Gagal Update Data siswa!.');
        }
    }

    public function verifyStatus($id, $status_pendaftaran){
        $user = Siswa::findOrFail($id);
        $user->status_pendaftaran = $status_pendaftaran;
        $user->save();
    return redirect()->back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        //  Delete File
         $imgPath = public_path() . '/img/pas_foto/' . $siswa->pas_foto;
        //  unlink($imgPath);
 
         // Delete Data
         $siswa->delete();
 
         return redirect()->route('admin.siswa.index')->with('success', 'Data berhasil di hapus');
    }

    public function exportPDF(){

    $siswa = Siswa::all();

    $dompdf = new Dompdf();

    $counter = 1;

    $html = '
    <!DOCTYPE html>
    <html>
    <head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
    </head>
    <body>
       
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>No registrasi</th>
                    <th>Nama lengkap</th>
                    <th>jenis kelamin</th>
                    <th>Agama</th>
                    <th>Tempat lahir</th>
                    <th>Tanggal lahir</th>
                    <th>Alamat</th>
                    <th>Status pendaftaran</th>
                </tr>
            </thead>
            <tbody>';


            $counter = 1;

            foreach ($siswa as $siswaItem) {
                $html .= '<tr>';
                $html .= '<td>' . $counter . '</td>';
                $html .= '<td>' . $siswaItem->no_registrasi. '</td>';
                $html .= '<td>' . $siswaItem->nama_lengkap.'</td>';
                $html .= '<td>' . $siswaItem->jenis_kelamin.'</td>';
                $html .= '<td>' . $siswaItem->agama.'</td>';
                $html .= '<td>' . $siswaItem->tempat_lahir.'</td>';
                $html .= '<td>' . $siswaItem->tanggal_lahir.'</td>';
                $html .= '<td>' . $siswaItem->alamat.'</td>';
                $html .= '<td>' . $siswaItem->status_pendaftaran.'</td>';
                $html .= '</tr>';
                $counter++;
            }

    $html .= '</tbody>';
    $html .= '</table>';

    // Load HTML content into Dompdf
    $dompdf->loadHtml($html);

    // Set paper size and orientation (optional)
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the PDF as a file (you can also save it to a path or output it to the browser)
    return $dompdf->stream('data_siswa.pdf', ['Attachment' => false]);
}

public function exportExcel()
{
    return Excel::download(new SiswaExport(), 'siswa.xlsx');
}

}
