@extends('layouts.dashboard')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Formulir pendaftaran</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section" style="min-height: 500px">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Status pendaftaran</h5>
                        {{-- @if (Auth::user() && Auth::user()->siswa) --}}
                        @if($isRegistered)
                          <div class="d-flex align-items-center mt-2">
                              <i class="bi bi-check-circle-fill text-success me-2"></i>
                              <p class="text-success mb-0">Status pendaftaran: Lengkap</p>
                          </div>
                        @else
                        <div class="d-flex align-items-center mt-2">
                          <i class="bi bi-x-circle-fill text-danger me-2"></i>
                          <p class="text-danger mb-0">Status pendaftaran: Belum lengkap </p>
                        </div>
                        {{-- @endif --}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Formulir Pendaftaran</h5>
                      {{-- @if (Auth::user() && Auth::user()->siswa) --}}
                      @if($isRegistered)
                        <div class="d-flex align-items-center mt-2">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <p class="text-success mb-0">Sudah mengisi formulir Pendaftaran</p>
                        </div>
                      @else
                      <div class="d-flex align-items-center mt-2">
                        <i class="bi bi-x-circle-fill text-danger me-2"></i>
                        <p class="text-danger mb-0"> Silahkan mengisi formulir Pendaftaran</p>
                      </div>
                      {{-- @endif --}}
                      @endif
                  </div>
              </div>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Biodata Formulir Siswa</h5>
                        @if ($siswa)
                        @if ($siswa->isEmpty())
                        <p>Tidak ada data siswa.</p>
                        @else
                        <form action="">
                            @csrf
                            <div class="row">
                                @foreach ($siswa as $data)
                                <div class="col-lg-5 text-center">
                                    <img src="{{ asset('img/pas_foto/'.$data->pas_foto) }}"
                                        style="width: 250px; height: auto;">
                                </div>
                                <div class="col-lg-5">
                                  
                                    <p>No Registrasi: {{ $data->no_registrasi }}</p>
                                    <p>Nama: {{ $data->nama_lengkap }}</p>
                                    <p>Jenis kelamin: {{ $data->jenis_kelamin }}</p>
                                    <p>Alamat: {{ $data->alamat }}</p>
                                    <p>Agama: {{ $data->agama }}</p>
                                    <p>Status Pendaftaran: {{ $data->status_pendaftaran }}</p>
                                    <p>Tanggal Daftar: {{ $data->created_at }}</p>
                                </div>
                                @endforeach
                            </div>
                            <div class="card-footer" style="float: right">
                                <div class="float-right">
                                    <a href="{{ route('user.formulir.edit', $data->id) }}" class="btn btn-primary">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    @if ($data->status_pendaftaran != 'pending' && $data->status_pendaftaran != 'tidak lulus' && $data->status_pendaftaran != 'ditolak')
                                        <a href="{{ route('user.formulir.cetak', $data->id) }}" class="btn btn-secondary">
                                            <i class="bi bi-printer"></i> Cetak
                                        </a>
                                    @else
                                    <p>Formulir tidak dapat dicetak karena status pendaftaran {{ $data->status_pendaftaran }}.</p>
                                    @endif
                                </div>
                            </div>
                        </form>
                        @endif
                        @else
                        <p>Tidak ada data siswa.</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
@endsection
