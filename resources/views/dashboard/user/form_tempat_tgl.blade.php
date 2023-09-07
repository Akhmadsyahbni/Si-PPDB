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
                <h5 class="card-title">Biodata Siswa</h5>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Semua data formulir wajib di isi!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <form method="post" action="{{route('user.tempat_tinggal')}}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-2">
                        <label for="inputText" class="col-lg-3 col-form-label">Nama Lengkap</label>
                        <div class="col-lg-6">
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                        </div>
                    </div>
                    {{-- <div class="row mb-2">
                        <label for="agama" class="col-lg-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-lg-3">
                            <select id="agama" name="agama" type="text" class="form-control">
                                <option value="">-- Pilih --</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
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
                    <div class="row mb-2">
                        <label for="inputText" class="col-lg-3 col-form-label">No hp</label>
                        <div class="col-lg-6">
                        <input type="text" name="no_hp" class="form-control" placeholder="Namor handphone">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputText" class="col-lg-3 col-form-label">Tempat lahir</label>
                        <div class="col-lg-6">
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat lahir">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="inputText" class="col-lg-3 col-form-label">Tanggal lahir</label>
                        <div class="col-lg-6">
                        <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal lahir">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="alamat" class="col-lg-3 col-form-label">Alamat</label>
                        <div class="col-lg-6">
                            <textarea name="alamat" id="alamat" cols="10" rows="5" class="form-control">Alamat</textarea>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="file" class="col-lg-3 col-form-label">Pas Foto</label>
                        <div class="col-lg-6">
                        <input type="file" name="pas_foto" class="form-control" placeholder="">
                        </div>
                    </div> --}}
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <button type="submit" name="action" value="prvious"  class="btn btn-primary">
                                <i class="bi bi-caret-left-fill"></i> sebelumnya
                            </button>
                            <button type="submit" name="action" value="next"  class="btn btn-primary">
                                <i class="bi bi-caret-right-fill"></i> Selanjutnya
                            </button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>    
</main>
@endsection