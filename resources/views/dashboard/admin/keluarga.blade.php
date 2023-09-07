@extends('layouts.dashboard')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Keluarga Siswa</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Data Keluarga Siswa</li>
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
                                    <th scope="col">Status keluarga</th>
                                    <th scope="col">Nama Ayah</th>
                                    <th scope="col">Nama Ibu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keluarga as $key => $keluargas)
                                <tr>
                                    <th scope="row">
                                        {{ ($keluarga->currentPage() - 1) * $keluarga->perPage() + $loop->iteration }}
                                    </th>
                                    <td>{{ $keluargas->siswa->nama_lengkap }}</td>
                                    <td>{{ $keluargas->status }}</td>
                                    <td>{{ $keluargas->nama_ayah }}</td>
                                    <td>{{ $keluargas->nama_ibu }}</td>
                                    <td>
                                        {{-- <button class="btn btn-sm btn-info">
                                            <i class="bi bi-info-circle"></i>
                                        </button> --}}
                                        <a href="{{route('admin.keluarga.edit_keluarga',['id' => $keluargas->id])}}" class="btn btn-sm btn-warning">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $keluarga->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
@endsection
