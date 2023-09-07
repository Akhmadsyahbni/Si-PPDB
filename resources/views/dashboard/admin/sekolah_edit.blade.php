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
                        <h5 class="card-title">Edit Data Sekolah Siswa</h5>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Cek Data Sekolah Siswa!
                            <!-- Menghapus atribut data-bs-dismiss pada button -->
                            <button type="button" class="btn-close"></button>
                        </div>
                        <form method="post" action="{{route('admin.siswa.update',$sekolah->id)}}" autocomplete="off"
                            enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Siswa</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$sekolah->siswa->nama_lengkap}}" disabled>
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Nisn</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$sekolah->nisn}}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Ijazah</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$sekolah->ijazah}}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Ijazah</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$sekolah->ijazah}}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">skhun</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$sekolah->skhun}}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Asal sekolah</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$sekolah->asal_sekolah}}">
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
