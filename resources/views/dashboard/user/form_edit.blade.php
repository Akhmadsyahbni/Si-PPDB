@extends('layouts.dashboard')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Formulir Pendaftaran</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item"> Edit Formulir Pendaftaran</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section" style="min-height: 600px">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Biodata Siswa</h5>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Cek kembali datamu  agar sesuai!
                             <!-- Menghapus atribut data-bs-dismiss pada button -->
                             <button type="button" class="btn-close"></button>
                         </div> 
                        <form method="post" action="{{ route('user.formulir.update', $siswa->id) }}" autocomplete="off"
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
                                        <option value="islam" {{ $siswa->agama == 'islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="kristen" {{ $siswa->agama == 'kristen' ? 'selected' : '' }}>Kristen</option>
                                        <option value="budha" {{ $siswa->agama == 'budha' ? 'selected' : '' }}>Budha</option>
                                        <option value="hindu" {{ $siswa->agama == 'hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="katolik" {{ $siswa->agama == 'katolik' ? 'selected' : '' }}>Katolik</option>
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
                            <h5 class="card-title">Biodata Keluarga</h5>
                            <div class="step-1 row mb-2">
                                <label for="status" class="col-lg-3 col-form-label">Status dalam keluarga</label>
                                <div class="col-lg-6">
                                    <input type="text" name="status" class="form-control" value="{{$siswa->keluarga->status}}">
                                </div>
                            </div>

                            <div class="step-1 row mb-2">
                                <label for="ayah" class="col-lg-3 col-form-label">Nama Ayah</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_ayah" class="form-control" value="{{ $siswa->keluarga->nama_ayah }}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="statusayah" class="col-lg-3 col-form-label">Status Ayah </label>
                                <div class="col-lg-3">
                                    <select id="status_ayah" name="status_ayah" class="form-control">
                                        <option value="masih hidup" {{ $siswa->status == 'masih hidup' ? 'selected' : '' }}>Masih Hidup</option>
                                        <option value="meninggal" {{ $siswa->status == 'meninggal' ? 'selected' : '' }}>Meninggal</option>
                                        <option value="tidaktau" {{ $siswa->status == 'tidaktau' ? 'selected' : '' }}>Tidak Diketahui</option>
                                    </select>
                                    
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="pekerjaanayah" class="col-lg-3 col-form-label">Pekerjaan ayah</label>
                                <div class="col-lg-6">
                                    <input type="text" name="pek_ayah" class="form-control"
                                        value="{{ $siswa->keluarga->pek_ayah }}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="pend_ayah" class="col-lg-3 col-form-label">Pendidikan Ayah </label>
                                <div class="col-lg-3">
                                    <select id="pend_ayah" name="pend_ayah" type="text" class="form-control">
                                        <option value="slta" {{ $siswa->pend_ayah == 'slta' ? 'selected' : '' }}>SLTA Sederajat</option>
                                        <option value="sd" {{ $siswa->pend_ayah == 'sd' ? 'selected' : '' }}>SD</option>
                                        <option value="smp" {{ $siswa->pend_ayah == 'smp' ? 'selected' : '' }}>SMP</option>
                                        <option value="d3" {{ $siswa->pend_ayah == 'd3' ? 'selected' : '' }}>D3</option>
                                        <option value="s1" {{ $siswa->pend_ayah == 's1' ? 'selected' : '' }}>S1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="ayah" class="col-lg-3 col-form-label">Nama ibu</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nama_ibu" class="form-control" value="{{ $siswa->keluarga->nama_ibu }}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="statusibu" class="col-lg-3 col-form-label">Status ibu </label>
                                <div class="col-lg-3">
                                    <select id="status_ibu" name="status_ibu" type="text" class="form-control">
                                        <option value="masih hidup" {{ $siswa->status_ibu == 'masih hidup' ? 'selected' : '' }}>Masih Hidup</option>
                                        <option value="meninggal" {{ $siswa->status_ibu == 'meninggal' ? 'selected' : '' }}>Meninggal</option>
                                        <option value="tidaktau" {{ $siswa->status_ibu == 'tidaktau' ? 'selected' : '' }}>Tidak Diketahui</option>
                                    </select>
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="pekerjaanibu" class="col-lg-3 col-form-label">Pekerjaan ibu</label>
                                <div class="col-lg-6">
                                    <input type="text" name="pek_ibu" class="form-control" value="{{ $siswa->keluarga->pek_ibu }}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="pend_ibu" class="col-lg-3 col-form-label">Pendidikan ibu </label>
                                <div class="col-lg-3">
                                    <select id="pend_ibu" name="pend_ibu" type="text" class="form-control">
                                        <option value="slta" {{ $siswa->pend_ibu == 'slta' ? 'selected' : '' }}>SLTA Sederajat</option>
                                        <option value="sd" {{ $siswa->pend_ibu == 'sd' ? 'selected' : '' }}>SD</option>
                                        <option value="smp" {{ $siswa->pend_ibu == 'smp' ? 'selected' : '' }}>SMP</option>
                                        <option value="d3" {{ $siswa->pend_ibu == 'd3' ? 'selected' : '' }}>D3</option>
                                        <option value="s1" {{ $siswa->pend_ibu == 's1' ? 'selected' : '' }}>S1</option>
                                    </select>
                                </div>
                            </div>
                            <h5 class="card-title">Data Asal Sekolah</h5>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">No Nisn</label>
                                <div class="col-lg-6">
                                    <input type="text" name="nisn" class="form-control" value="{{ $siswa->sekolah->nisn }}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">No ijazah</label>
                                <div class="col-lg-6">
                                    <input type="text" name="ijazah" class="form-control" value="{{ $siswa->sekolah->ijazah }}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">No Skhun</label>
                                <div class="col-lg-6">
                                    <input type="text" name="skhun" class="form-control"  value="{{ $siswa->sekolah->skhun }}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Tahun Skhun</label>
                                <div class="col-lg-6">
                                    <input type="text" name="tahun_skhun" class="form-control"
                                        value="{{ $siswa->sekolah->tahun_skhun }}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Tahun lulus</label>
                                <div class="col-lg-6">
                                    <input type="text" name="tahun_lulus" class="form-control"
                                        value="{{ $siswa->sekolah->tahun_lulus }}">
                                </div>
                            </div>
                            <div class="step-1 row mb-2">
                                <label for="inputText" class="col-lg-3 col-form-label">Asal sekolah</label>
                                <div class="col-lg-6">
                                    <input type="text" name="asal_sekolah" class="form-control"
                                        value="{{ $siswa->sekolah->asal_sekolah }}">
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
