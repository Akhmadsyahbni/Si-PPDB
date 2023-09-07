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
                        <h5 class="card-title text-center">Pengaturan Waktu Ppdb</h5>
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ route('admin.ppdb-settings.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                            
                                    <label for="start_date" class="col-lg-3 col-form-label">Tanggal Mulai PPDB:</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $ppdb->start_date }}" required>
                            
                                    <label for="end_date" class="col-lg-3 col-form-label">Tanggal Berakhir PPDB:</label>
                                    <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $ppdb->end_date }}" required>
                            
                                    <button type="submit" style="float: right" class="btn btn-primary mt-3">
                                        <i class=" bi bi-save"> Simpan</i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

</main>
@endsection
