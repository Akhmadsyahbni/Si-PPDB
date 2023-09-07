<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Keluarga;
use App\Models\Sekolah;
use Carbon\Carbon;
use Dompdf\Dompdf;
class FormulirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
     public function cetakFormulir($id)
     {
         // Ambil data siswa berdasarkan ID
        //  $siswa = Siswa::findOrFail($id);
         $siswa = Siswa::findOrFail($id);
         // Create new Dompdf instance
         $dompdf = new Dompdf();
         
         $html = '<html>';
         $html .= '<head>';
         // Add any necessary styles for the header, such as logo positioning, font styles, etc.
         $html .= '<style>';
         $html .= 'body { font-family: Arial, sans-serif; }';
         $html .= '.header { display: flex; align-items: center; justify-content: center; }'; // Center align the content
         $html .= '.logo { width: 80px; height: auto; float: left; margin-right: 1px; }'; // Adjust logo size and float it left
         $html .= '.school-info h1 { margin: 2px 0; text-align:center }'; // Adjust margin for school information
         $html .= '.school-info p { margin: 3px 0; text-align:center }'; 
         $html .= '.contact-info p { margin: 2px 0; text-align:center }'; // Adjust margin for contact information
         $html .= '.underline { border-bottom: 1px solid #000; margin-bottom: 20px; }';
         $html .= '.contact-info p { margin: 2px 0; text-align:center }'; 
         $html .= '.form-container { display: flex; }'; // Use flexbox for the two-column layout
         $html .= '.form-left { width: 70%; float: left; }'; // Width of the left column
         $html .= '.form-right { width: 30%; float: right; text-align: right; }'; // Width of the right column, align text to the right
         $html .= '.form-right img { width: 150px; height: auto; }'; // Adjust size of the pas_foto image
         $html .= '</style>';
         $html .= '</head>';
         $html .= '<body>';
         
         // Add the header section with the school logo, name, address, telephone, and email
         $html .= '<div class="header">';
         $imagePath = public_path('assets/img/logo2.png');
         $imageData = base64_encode(file_get_contents($imagePath));
         $imageSrc = 'data:image/jpeg;base64,' . $imageData;
         $html .= '<img src="' . $imageSrc . '" class="logo">';
         $html .= '<div class="school-info">';
         $html .= '<h1>SMP AL-IKHLAS Buntet Pesantren</h1>';
         $html .= '<p>JL. Buntet Pesantren Desa, Mertapada Kulon,Kec. Astanajapura,Kabupaten Cirebon</p>';
         $html .= '<div class="contact-info">';
         $html .= '<p>Email: info@smpalikhlaspesantren.com</p>';
         $html .= '</div>';
         // Add a horizontal line as the underline for the header
         $html .= '<div class="underline"></div>';
         $html .= '</div>';
         
         $html .= '<div class="form-container">';
         $html .= '<div class="form-left">';
         // Continue with the rest of the content
         $html .= '<h1>Biodata Formulir Siswa</h1>';
         // Load the image file from the public directory and encode it to base64
         $html .= '</div>';
         $html .= '<div class="form-right">';
         $imagePath = public_path('img/pas_foto/' . $siswa->pas_foto);
         $imageData = base64_encode(file_get_contents($imagePath));
         $imageSrc = 'data:image/jpeg;base64,' . $imageData;
         $html .= '<img src="' . $imageSrc . '" style="width: 250px; height: auto;"><br>';
         $html .= '</div>';
         $html .= '</div>';
         
         $html .= '<p>No Registrasi: ' . $siswa->no_registrasi . '</p>';
         $html .= '<p>Nama: ' . $siswa->nama_lengkap . '</p>';
         $html .= '<p>Jenis kelamin: ' . $siswa->jenis_kelamin . '</p>';
         $html .= '<p>Alamat: ' . $siswa->alamat . '</p>';
         $html .= '<p>Agama: ' . $siswa->agama . '</p>';
         $html .= '<p>Status Pendaftaran: ' . $siswa->status_pendaftaran . '</p>';
         $html .= '<p>Tanggal Daftar: ' . $siswa->created_at . '</p>';
         $html .= '<center><h1>DITERIMA</h1></center>';
         $html .= '<center><p>Menjadi Peserta Didik Baru tahun ajaran 2023/2024</p></center>';
         $html .= '<div style="text-align: right; margin-top: 50px;">';
         $html .= '<p><strong>Diketahui oleh:</strong></p>';
         $html .= '<p>Cirebon, ' . date('Y-m-d') . '</p>'; // Tanggal saat ini
         $imagePath2 = public_path('assets/img/ttd.png');
         $imageData2 = base64_encode(file_get_contents($imagePath2));
         $imageSrc2 = 'data:image/jpeg;base64,' . $imageData2;
         $html .= '<img src="' . $imageSrc2 . '" style="width: 180px; align="right" alt="Tanda Tangan Kepala Sekolah"';
         $html .= '<p>Budi Suhartono M.pd</p>';
         $html .= '<p>NIP : 2091 12320 299857</p>';
         $html .= '</div>';
         $html .= '</body>';
         $html .= '</html>';
     
         // Load HTML content into Dompdf
         $dompdf->loadHtml($html);
     
         // Set paper size and orientation (optional)
         $dompdf->setPaper('A4', 'portrait');
     
         // Render the HTML as PDF
         $dompdf->render();
         
         // Output the PDF as a file (you can also save it to a path or output it to the browser)
         return $dompdf->stream('formulir_siswa.pdf', ['Attachment' => false]);
     }
     
     

    public function profile(){
        return view ('dashboard.user.profile');
    }

    public function index()
    {
        // $siswa = Siswa::where('user_id', Auth::user()->id)->get();
        return view('dashboard.user.formulir_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.formulir');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        $siswa = new Siswa;
        if (!empty($request)) {
        $siswa->user_id = $user->id;
        // $no_registrasi = Carbon::now()->format('Ymd') . Str::random(5);
        $no_registrasi = str_pad(mt_rand(10000000, 99999999), 7, '0', STR_PAD_LEFT);
        $siswa->no_registrasi = $no_registrasi;
        $siswa->nama_lengkap = $data['nama_lengkap'];
        $siswa->jenis_kelamin = $data['jenis_kelamin'];
        $siswa->agama = $data['agama'];
        $siswa->no_hp = $data['no_hp'];
        $siswa->tempat_lahir = $data['tempat_lahir'];
        $siswa->tanggal_lahir = $data['tanggal_lahir'];
        $siswa->alamat = $data['alamat'];
        if (!empty($request->hasFile('pas_foto'))) {
            $file = $request->file('pas_foto');
            $imgExtension = $file->getClientOriginalExtension();
            $imgName = $request->name . "-" . Carbon::now()->format('d-m-Y');
            // Asd-28012022
            $imgFullName = $imgName . '.' . $imgExtension;
            // Asd-28012022.png
            $imgPath = 'img/pas_foto';
            $file->move(public_path($imgPath), $imgFullName);
            $siswa->pas_foto = $imgFullName;
        }
        if (!empty($request->hasFile('bukti_pembayaran'))) {
            $file = $request->file('bukti_pembayaran');
            $imgExtension = $file->getClientOriginalExtension();
            $imgName = $request->name . "-" . Carbon::now()->format('d-m-Y');
            // Asd-28012022
            $imgFullName = $imgName . '.' . $imgExtension;
            // Asd-28012022.png
            $imgPath = 'img/bukti_pembayaran';
            $file->move(public_path($imgPath), $imgFullName);
            $siswa->bukti_pembayaran = $imgFullName;
        }

        $siswa->status_pendaftaran = 'pending';
        $siswa->is_registered = true;
        // Ambil data siswa terbaru
        $siswaBaru = Siswa::where('user_id', $user->id)->latest()->first();
        $save = $siswa->save();

        }

        $keluarga = new Keluarga;
        $keluarga->siswa_id = $siswa->id;
        $keluarga->status = $data['status'];
        $keluarga->nama_ayah = $data['nama_ayah'];
        $keluarga->status_ayah = $data['status_ayah'];
        $keluarga->pek_ayah = $data['pek_ayah'];
        $keluarga->pend_ayah = $data['pend_ayah'];
        $keluarga->nama_ibu = $data['nama_ibu'];
        $keluarga->status_ibu = $data['status_ibu'];
        $keluarga->pek_ibu = $data['pek_ibu'];
        $keluarga->pend_ibu = $data['pend_ibu'];
        $save = $keluarga->save();

        $sekolah = new Sekolah;
        $sekolah->siswa_id = $siswa->id;
        $sekolah->nisn = $data['nisn'];
        $sekolah->ijazah = $data['ijazah'];
        $sekolah->skhun = $data['skhun'];
        $sekolah->tahun_skhun = $data['tahun_skhun'];
        $sekolah->tahun_lulus = $data['tahun_lulus'];
        $sekolah->asal_sekolah = $data['asal_sekolah'];
        $save = $sekolah->save();
        
        if($save){
            return redirect()->route('user.home.index')->with('success', 'Berhasil Daftar')->with('siswaBaru', $siswaBaru);
        }else{
            return redirect()->back()->with('fail', 'Gagal Mendaftarkan');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = Auth::user();
        // $siswa = $user->siswa;
        // return view('dashboard.user.home', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $siswa = Siswa::find($id);
        $siswa = Siswa::with('keluarga', 'sekolah')->find($id);
        return view('dashboard.user.form_edit',compact('siswa'));
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
    //Menemukan data siswa yang akan diupdate
    $siswa = Siswa::with('keluarga', 'sekolah')->find($id);
   
    $siswa->update([
        'nama_lengkap' => $request->input('nama_lengkap'),
        'jenis_kelamin' => $request->input('jenis_kelamin'),
        'agama' => $request->input('agama'),
        'no_hp' => $request->input('no_hp'),
        'tempat_lahir' => $request->input('tempat_lahir'),
        'tanggal_lahir' => $request->input('tanggal_lahir'),
        'alamat' => $request->input('alamat'),
    ]);
    
    // Memperbarui data keluarga siswa
    $siswa->keluarga->update([
        'status' => $request->input('status'),
        'nama_ayah' => $request->input('nama_ayah'),
        'status_ayah' => $request->input('status_ayah'),
        'pek_ayah' => $request->input('pek_ayah'),
        'pend_ayah' => $request->input('pend_ayah'),
        'nama_ibu' => $request->input('nama_ibu'),
        'status_ibu' => $request->input('status_ibu'),
        'pek_ibu' => $request->input('pek_ibu'),
        'pend_ibu' => $request->input('pend_ibu'),
    ]);
    
    // Memperbarui data sekolah siswa
    $siswa->sekolah->update([
        'nisn' => $request->input('nisn'),
        'ijazah' => $request->input('ijazah'),
        'skhun' => $request->input('skhun'),
        'tahun_skhun' => $request->input('tahun_skhun'),
        'tahun_lulus' => $request->input('tahun_lulus'),
        'asal_sekolah' => $request->input('asal_sekolah'),
    ]);
    
    return redirect()->back()->with('success', 'Data siswa berhasil diperbarui.');
    }
     

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
