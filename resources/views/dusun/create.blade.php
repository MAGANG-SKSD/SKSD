@extends('layouts.app')

@section('title', 'Tambah Laporan Realisasi')

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Tambah laporan</h2>
                                <p class="mb-0 text-sm">Kelola Laporan Realisasi Desa</p>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route("dusun.index") }}" class="btn btn-success" title="Kembali"><i class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
@include('layouts.components.alert')

<div class="row justify-content-center">
    <!-- Kolom untuk input nama dusun -->
    <div class="col-md-5 mb-3">
        <div class="card bg-secondary shadow h-100">
            <div class="card-body">
                <form id="form-nama-dusun" autocomplete="off" action="{{ route('dusun.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="nama">Nama Dusun</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan Nama Dusun ..." value="{{ old('nama') }}">
                        @error('nama')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Kolom untuk input tahun -->
    <div class="col-md-5 mb-3">
        <div class="card bg-secondary shadow h-100">
            <div class="card-body">
                <form id="form-tahun" autocomplete="off" action="{{ route('dusun.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="tahun">Tahun</label>
                        <input type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" placeholder="Masukkan Tahun ..." value="{{ old('tahun') }}">
                        @error('tahun')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Baris baru untuk input "Laporan Terperinci" -->
<div class="row justify-content-center">
    <div class="col-md-10 mb-3">
        <div class="card bg-secondary shadow h-100">
            <div class="card-body">
                <form id="form-laporan-terperinci" autocomplete="off" action="{{ route('dusun.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label" for="laporan_terperinci">Laporan Terperinci</label>
                        <textarea class="form-control @error('laporan_terperinci') is-invalid @enderror" name="laporan_terperinci" rows="4" placeholder="Masukkan Laporan Terperinci ...">{{ old('laporan_terperinci') }}</textarea>
                        @error('laporan_terperinci')<span class="invalid-feedback font-weight-bold">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tombol SIMPAN di luar form dan di tengah bawah halaman -->
<div class="d-flex justify-content-center mt-4">
    <button type="button" class="btn btn-primary" onclick="document.querySelectorAll('form').forEach(form => form.submit());">SIMPAN</button>
</div>
@endsection
