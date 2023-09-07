@extends('layouts.dashboard')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Admin Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Admin</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section" style="min-height: 500px">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Detail Data Siswa</h5>
                        <div class="row">
                            {{-- <div class="col-lg-1 text-center">
                                <img src="{{ asset('img/pas_foto/'.$siswa->pas_foto) }}"
                                    style="width: 70px; height: auto;">
                            </div> --}}
                            <div class="col-lg-12">
                               <table class="table">
                               <thead>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Agama</th>
                                <th scope="col">jenis Kelamin</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Alamat</th>
                               </thead>
                                <tbody>
                                    {{-- @foreach ($siswa as $key => $siswas) --}}
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $siswa->nama_lengkap }}</td>
                                        <td>{{ $siswa->agama }}</td>
                                        <td>{{ $siswa->jenis_kelamin }}</td>
                                        <td>{{ $siswa->no_hp }}</td>
                                        <td>{{ $siswa->tempat_lahir}}</td>
                                        <td>{{ $siswa->tanggal_lahir}}</td>
                                        <td>{{ $siswa->alamat}}</td>
                                    </tr>
                                    {{-- @endforeach --}}
                                </tbody>
                               </table>
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
