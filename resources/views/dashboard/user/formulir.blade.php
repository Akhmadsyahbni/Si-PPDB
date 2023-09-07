@extends('layouts.dashboard')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Formulir Pendaftaran</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item">Formulir Pendaftaran</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
  
      <section class="section"style="min-height: 600px">
        <div class="row">
          <div class="col-lg-12">
  
            <div class="card">
                    <div class="card-body">
                        @if (auth()->user()->siswa)
                        <h5 class="card-title">Anda Sudah mendaftar sebelumnya</h5>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                           Mohon maaf anda tidak bisa mendaftar lagi!
                            <!-- Menghapus atribut data-bs-dismiss pada button -->
                            <button type="button" class="btn-close"></button>
                        </div>                        
                        @else
                        <h5 class="card-title">Biodata Siswa</h5>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            ini adalah informasi no rekening sekolah, Harap isi semua data Form!<br>
                            No rekening Bri : 304xxxx<br>
                            No rekening Bca : 165xxxx<br>
                            No rekening Bni : 184xxxx
                            <button type="button" class="btn-close"></button>
                        </div>
                        <form method="post" action="{{route('user.formulir.store')}}" autocomplete="off" enctype="multipart/form-data">
                            @method('post')
                            @csrf
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Nama Lengkap</label>
                                <div class="col-lg-6">
                                <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="agama" class="col-lg-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-lg-3">
                                    <select id="agama" name="jenis_kelamin" type="text" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="jenis_kelamin" class="col-lg-3 col-form-label">Agama</label>
                                <div class="col-lg-3">
                                    <select id="jenis_kelamin" name="agama" type="text" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <option value="islam">islam</option>
                                        <option value="kristen">kristen</option>
                                        <option value="budha">budha</option>
                                        <option value="hindu">hindu</option>
                                        <option value="katolik">katolik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">No hp</label>
                                <div class="col-lg-6">
                                <input type="text" name="no_hp" class="form-control" placeholder="Namor handphone">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Tempat lahir</label>
                                <div class="col-lg-6">
                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat lahir">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Tanggal lahir</label>
                                <div class="col-lg-6">
                                <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal lahir">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="alamat" class="col-lg-3 col-form-label">Alamat</label>
                                <div class="col-lg-6">
                                    <textarea name="alamat" id="alamat" cols="10" rows="5" class="form-control">Alamat</textarea>
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="file" class="col-lg-3 col-form-label">Pas Foto</label>
                                <div class="col-lg-6">
                                <input type="file" name="pas_foto" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="file" class="col-lg-3 col-form-label">Bukti pembayaran</label>
                                <div class="col-lg-6">
                                <input type="file" name="bukti_pembayaran" class="form-control" placeholder="">
                                <label for="file" class="col-lg-5 col-form-label">Metode Pembayaran tersedia</label>
                                <img src="{{asset('assets/img/bri.png')}}" alt="" width="60px" style="margin: 10px">
                                <img src="{{asset('assets/img/bca.png')}}" alt="" width="60px" style="margin: 10px">
                                <img src="{{asset('assets/img/bni.png')}}" alt="" width="60px" style="margin: 10px">
                                </div>
                            </div>
                            <h5 class="card-title">Biodata Keluarga</h5>
                            <div class="step-1 row mb-2">
                                <label for="status" class="col-lg-3 col-form-label">Status dalam keluarga</label>
                                <div class="col-lg-6">
                                <input type="text" name="status" class="form-control" placeholder="Status">
                                </div>
                            </div>

                            <div class="step-1 row mb-2">
                                <label for="ayah" class="col-lg-3 col-form-label">Nama Ayah</label>
                                <div class="col-lg-6">
                                <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                            <label for="statusayah" class="col-lg-3 col-form-label">Status Ayah </label>
                                <div class="col-lg-3">
                                    <select id="agama" name="status_ayah" type="text" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <option value="masih">Masih hidup</option>
                                        <option value="meninggal">Meninggal</option>
                                        <option value="tidaktau">Tidak diketahui</option>
                                    </select>
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="pekerjaanayah" class="col-lg-3 col-form-label">Pekerjaan ayah</label>
                                <div class="col-lg-6">
                                <input type="text" name="pek_ayah" class="form-control" placeholder="Pekerjaan Ayah">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="statusayah" class="col-lg-3 col-form-label">Pendidikan Ayah </label>
                                    <div class="col-lg-3">
                                        <select id="agama" name="pend_ayah" type="text" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="slta">SLTA Sederajat</option>
                                            <option value="sd">SD</option>
                                            <option value="smp">SMP</option>
                                            <option value="d3">D3</option>
                                            <option value="s1">S1</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="step-1 row mb-2">
                                    <label for="ayah" class="col-lg-3 col-form-label">Nama ibu</label>
                                    <div class="col-lg-6">
                                    <input type="text" name="nama_ibu" class="form-control" placeholder="Nama ibu">
                                    </div>
                                </div>
                                <div class="step-1 row mb-2">
                                <label for="statusibu" class="col-lg-3 col-form-label">Status ibu </label>
                                    <div class="col-lg-3">
                                        <select id="agama" name="status_ibu" type="text" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="masih">Masih hidup</option>
                                            <option value="meninggal">Meninggal</option>
                                            <option value="tidaktau">Tidak diketahui</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="step-1 row mb-2">
                                    <label for="pekerjaanibu" class="col-lg-3 col-form-label">Pekerjaan ibu</label>
                                    <div class="col-lg-6">
                                    <input type="text" name="pek_ibu" class="form-control" placeholder="Pekerjaan ibu">
                                    </div>
                                </div>
                                <div class="step-1 row mb-2">
                                    <label for="statusibu" class="col-lg-3 col-form-label">Pendidikan ibu </label>
                                        <div class="col-lg-3">
                                            <select id="agama" name="pend_ibu" type="text" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                <option value="slta">SLTA Sederajat</option>
                                                <option value="sd">SD</option>
                                                <option value="smp">SMP</option>
                                                <option value="d3">D3</option>
                                                <option value="s1">S1</option>
                                            </select>
                                        </div>
                                </div>
                            <h5 class="card-title">Data Asal Sekolah</h5>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">No Nisn</label>
                                <div class="col-lg-6">
                                <input type="text" name="nisn" class="form-control" placeholder="Nisn">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">No ijazah</label>
                                <div class="col-lg-6">
                                <input type="text" name="ijazah" class="form-control" placeholder="No ijazah">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">No Skhun</label>
                                <div class="col-lg-6">
                                <input type="text" name="skhun" class="form-control" placeholder="No skhun">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Tahun Skhun</label>
                                <div class="col-lg-6">
                                <input type="text" name="tahun_skhun" class="form-control" placeholder="Tahun skhun">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Tahun lulus</label>
                                <div class="col-lg-6">
                                <input type="text" name="tahun_lulus" class="form-control" placeholder="Tahun lulus">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Asal sekolah</label>
                                <div class="col-lg-6">
                                <input type="text" name="asal_sekolah" class="form-control" placeholder="Asal Sekolah">
                                </div>
                            </div>
                            <div class="card-footer" style="float: right">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save"></i> Simpan
                                    </button>
                                    <button type="submit" class="btn btn-warning">
                                        <i class="bi bi-arrow-counterclockwise"></i> Batal
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif

            </div>
          </div>
        </div>
      </section>    
</main>
@endsection