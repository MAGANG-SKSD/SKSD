@extends('layouts.app')

@section('title', 'Dashboard')

@section('styles')
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/accessibility.js"></script>
@endsection

@section('content-header')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6 col-sm-6 mb-3">
                <div class="card card-stats shadow h-100">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Cetak Surat Hari Ini</h5>
                                <span class="h2 font-weight-bold mb-0">{{ $hari }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 mb-3">
                <div class="card card-stats shadow h-100">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Cetak Surat Bulan Ini</h5>
                                <span class="h2 font-weight-bold mb-0">{{ $bulan }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 mb-3">
                <div class="card card-stats shadow h-100">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Cetak Surat Tahun Ini</h5>
                                <span class="h2 font-weight-bold mb-0">{{ $tahun }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 mb-3">
                <div class="card card-stats shadow h-100">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Cetak Surat</h5>
                                <span class="h2 font-weight-bold mb-0">{{ $totalCetakSurat }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                    <i class="fas fa-file-alt"></i>
                                </div>
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
<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card shadow h-100">
            <div class="card-header">
                <div
                    class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                    <div class="mb-1">
                        <h2 class="mb-0">Grafik Cetak Surat Harian</h2>
                    </div>
                    <div class="mb-1">
                        <input type="date" name="tanggal" id="tanggal" class="form-control-sm" value="{{ date('Y-m-d') }}">
                        <img id="loading-tanggal-surat" src="{{ asset(Storage::url('loading.gif')) }}" alt="Loading" height="20px" style="display: none">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="chart-harian" style="height: 400px; margin: 0 auto"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card shadow h-100">
            <div class="card-header font-weight-bold">
                <div
                    class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                    <div class="mb-1">
                        <h2 class="mb-0">Grafik Cetak Surat Bulanan</h2>
                    </div>
                    <div class="mb-1">
                        <input type="month" name="bulan" id="bulan" class="form-control-sm" value="{{ date('Y-m') }}">
                        <img id="loading-bulan-surat" src="{{ asset(Storage::url('loading.gif')) }}" alt="Loading" height="20px" style="display: none">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="chart-bulanan" style="height: 400px; margin: 0 auto"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-4">
        <div class="card shadow h-100">
            <div class="card-header font-weight-bold">
                <div
                    class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                    <div class="mb-1">
                        <h2 class="mb-0">Grafik Cetak Surat Tahunan</h2>
                    </div>
                    <div class="mb-1">
                        Tahun : <input type="number" name="tahun" id="tahun" class="form-control-sm" value="{{ date('Y') }}" style="width:80px">
                        <img id="loading-tahun-surat" src="{{ asset(Storage::url('loading.gif')) }}" alt="Loading" height="20px" style="display: none">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="chart-tahunan" style="height: 400px; margin: 0 auto"></div>
            </div>
        </div>
    </div>
    @include('statistik-penduduk.card')
    <div class="col-md-12 mb-4">
        <div class="card shadow h-100">
            <div class="card-header">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                    <div class="mb-1">
                        <h2 class="mb-0">Grafik Pelaksanaan APBDes</h2>
                    </div>
                    <div class="mb-1">
                        Tahun : <input type="number" name="tahun-apbdes" id="tahun-apbdes" class="form-control-sm" value="{{ date('Y') }}" style="width:80px">
                        <img id="loading-tahun" src="{{ asset(Storage::url('loading.gif')) }}" alt="Loading" height="20px" style="display: none">
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('anggaran-realisasi.grafik-apbdes')
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/apbdes.js') }}"></script>
<script src="{{ asset('js/statistik-penduduk.js') }}"></script>
<script>
    let bar = {
        chart: {
            type: 'bar',
        },
        xAxis: {
            type: 'category',
            title: {
                text: null
            },
            min: 0,
            max: 4,
            scrollbar: {
                enabled: true
            },
            tickLength: 0
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Cetak',
                align: 'high'
            }
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Jumlah Cetak',
            data: []
        }]
    };

    let chart_harian = Highcharts.chart('chart-harian', bar);
    let chart_bulanan = Highcharts.chart('chart-bulanan', bar);
    let chart_tahunan = Highcharts.chart('chart-tahunan', bar);
</script>
@endpush
