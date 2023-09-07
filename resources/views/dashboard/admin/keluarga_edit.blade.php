@extends('layouts.dashboard')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Halaman Edit Siswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item"> Edit Data keluarga Siswa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section" style="min-height: 600px">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Data Keluarga Siswa</h5>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Cek Data Sekolah Siswa!
                            <!-- Menghapus atribut data-bs-dismiss pada button -->
                            <button type="button" class="btn-close"></button>
                        </div>
                        <form method="post" action="{{route('admin.keluarga.update',$keluarga->id)}}" autocomplete="off"
                            enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Siswa</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$keluarga->siswa->nama_lengkap}}" disabled>
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Status dalam keluarga</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$keluarga->status}}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Nama Ayah</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$keluarga->nama_ayah}}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Status Ayah</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$keluarga->status_ayah}}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Pekerjaan Ayah</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$keluarga->pek_ayah}}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Pekerjaan Ayah</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$keluarga->pend_ayah}}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Nama Ibu</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$keluarga->nama_ibu}}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Status Ibu</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$keluarga->status_ibu}}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Pekerjaan Ibu</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$keluarga->pek_ibu}}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Pendidikan Ibu</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$keluarga->pend_ibu}}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Status Ibu</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$keluarga->status_ibu}}">
                                </div>
                            </div>
                            {{-- <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Ijazah</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$keluarga->ijazah}}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Ijazah</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$keluarga->ijazah}}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">skhun</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$keluarga->skhun}}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Asal sekolah</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_lengkap" class="form-control"
                                        value="{{$sekolah->asal_sekolah}}">
                                </div>
                            </div> --}}
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
