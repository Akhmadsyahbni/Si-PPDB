@extends('layouts.dashboard')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Sekolah Siswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Data Sekolah Siswa</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section" style="min-height: 500px">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datatables</h5>
                        <!-- Table with stripped rows -->
                        <table id="myTable" class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Siswa</th>
                                    <th scope="col">Nisn</th>
                                    <th scope="col">Ijazah</th>
                                    <th scope="col">skhun</th>
                                    <th scope="col">Asal sekolah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sekolah as $key => $sekolahs)
                                <tr>
                                    <th scope="row">
                                        {{ ($sekolah->currentPage() - 1) * $sekolah->perPage() + $loop->iteration }}
                                    </th>
                                    <td>{{ $sekolahs->siswa->nama_lengkap }}</td>
                                    <td>{{$sekolahs->nisn}}</td>
                                    <td>{{$sekolahs->ijazah}}</td>
                                    <td>{{$sekolahs->skhun}}</td>
                                    <td>{{$sekolahs->asal_sekolah}}</td>
                                    <td>
                                        {{-- <a class="btn btn-sm btn-info">
                                            <i class="bi bi-info-circle"></i>
                                        </a> --}}
                                        <a class="btn btn-sm btn-warning" href="{{route('admin.sekolah.edit_sekolah',['id' => $sekolahs->id])}}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $sekolah->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
@endsection
