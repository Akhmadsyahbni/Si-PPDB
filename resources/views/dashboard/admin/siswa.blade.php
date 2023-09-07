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
                        <h5 class="card-title">Datatables</h5>
                        <a href="{{ route('admin.siswa.export.pdf') }}" class="btn btn-primary"><i class="bi bi-file-pdf"></i>PDF</a>
                        <a href="{{ route('admin.siswa.export.excel') }}" class="btn btn-success"><i class="bi bi-file-excel"></i>EXCEL</a>
                        <div class="card-body table-responsive p-0">
                            @if ($siswa->isEmpty())
                            <div class="text-center my-2"><i>Data empty.</i></div>
                            @else
                            <table id="myTable" class="table datatable">
                                <thead>
                                    <tr>
                                        <th style="width: 20px;" class="text-center">No</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">No Registrasi</th>
                                        <th scope="col">Status Pendaftaran</th>
                                        <th style="width: 50px;" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa as $key => $siswas)
                                    <tr>
                                        <th scope="row">
                                            {{ $key + $siswa->firstItem() }}
                                        </th>
                                        <td>{{ $siswas->nama_lengkap }}</td>
                                        <td>{{ $siswas->no_registrasi }}</td>
                                        <td>
                                            @if ($siswas->status_pendaftaran === 'pending')
                                            <a href="{{ route('admin.verifyStatus', ['id' => $siswas->id, 'status' => 'lulus']) }}" class="btn btn-sm btn-success">
                                                <i class="bi bi-check2"></i>
                                            </a>
                                            <a href="{{ route('admin.verifyStatus', ['id' => $siswas->id, 'status' => 'ditolak']) }}" class="btn btn-sm btn-danger">
                                                <i class="bi bi-x"></i>
                                            </a>
                                            @else
                                            {{ $siswas->status_pendaftaran }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.siswa.show', ['siswa' => $siswas->id])}}"
                                                class="btn btn-sm btn-info">
                                                <i class="bi bi-info-circle"></i>
                                            </a>
                                            <a href="{{route('admin.siswa.edit', ['siswa' => $siswas->id])}}"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="#data{{$siswas->id}}" data-bs-toggle="modal"
                                                class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    {{-- MODAL FOR DELETE ITEM --}}
                                    <div class="modal fade" tabindex="-1" id="data{{ $siswas->id }}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Yakin Hapus Data?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Sekali lagi apakah anda yakin ingin menghapus data siswa
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="POST"
                                                        action="{{route('admin.siswa.destroy', $siswas->id) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="bi bi-trash"></i>&nbsp;&nbsp;Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                        <div class="float-right mt-3">
                            {{ $siswa->links() }}
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main>
@endsection
