@extends('layouts.dashboard')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Halaman Edit Siswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item"> Edit Data Siswa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section" style="min-height: 600px">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Data Siswa</h5>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Cek Data Siswa!
                            <!-- Menghapus atribut data-bs-dismiss pada button -->
                            <button type="button" class="btn-close"></button>
                        </div>
                        <form method="post" action="{{route('admin.siswa.update',$siswa->id)}}" autocomplete="off"
                            enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Nama Lengkap</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$siswa->nama_lengkap}}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="agama" class="col-lg-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-lg-3">
                                    <select id="agama" name="jenis_kelamin" type="text" class="form-control">
                                        <option value="Laki-Laki">{{$siswa->jenis_kelamin}}</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="jenis_kelamin" class="col-lg-3 col-form-label">Agama</label>
                                <div class="col-lg-3">
                                    <select id="jenis_kelamin" name="agama" type="text" class="form-control">
                                        <option value="">--Pilih--</option>
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
                                    <input type="text" name="no_hp" class="form-control" value="{{$siswa->no_hp}}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Tempat lahir</label>
                                <div class="col-lg-6">
                                    <input type="text" name="tempat_lahir" class="form-control"
                                        value="{{$siswa->tempat_lahir}}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Tanggal lahir</label>
                                <div class="col-lg-6">
                                    <input type="date" name="tanggal_lahir" class="form-control"
                                        value="{{$siswa->tanggal_lahir}}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="alamat" class="col-lg-3 col-form-label">Alamat</label>
                                <div class="col-lg-6">
                                    <textarea name="alamat" id="alamat" cols="10" rows="5"
                                        class="form-control">{{$siswa->alamat}}</textarea>
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
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
