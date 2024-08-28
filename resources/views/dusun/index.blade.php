@extends('layouts.app')

@section('title', 'Laporan Realisasi')

@section('styles')
<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<style>
    .ikon {
        font-family: fontAwesome;
    }
</style>
@endsection

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-header border-0">
                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-md-between text-center text-md-left">
                            <div class="mb-3">
                                <h2 class="mb-0">Laporan Realisasi Desa</h2>
                                <p class="mb-0 text-sm">Kelola Realisasi Desa</p>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('form-search')
<form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto" action="{{ URL::current() }}" method="GET">
    <div class="form-group mb-0">
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Cari ...." type="text" name="cari" value="{{ request('cari') }}">
        </div>
    </div>
</form>
@endsection

@section('content')
@include('layouts.components.alert')
<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm table-stripped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" width="20px">Id</th>
                        <th class="text-center">Nama Dusun</th>
                        <th class="text-center">Tahun</th>
                        <th class="text-center">Laporan Terperinci</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Kosongkan isi tabel -->
                    <tr>
                        <td colspan="4" align="center">Data tidak tersedia</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
