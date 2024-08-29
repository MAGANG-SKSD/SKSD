<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HakAksesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['web', 'auth']], function () {
    // Rute untuk kelola hak akses
    Route::get('/kelola-hak-akses', [HakAksesController::class, 'index'])->name('hak-akses.index')->middleware('auth','admin');
    Route::get('/tambah-hak-akses', [HakAksesController::class, 'create'])->name('hak-akses.create')->middleware('auth','admin');
    Route::get('/edit-hak-akses/{id}', [HakAksesController::class, 'edit'])->name('hak-akses.edit')->middleware('auth','admin');
    Route::post('/hak-akses', [HakAksesController::class, 'store'])->name('hak-akses.store');
    Route::patch('/hak-akses/{id}', [HakAksesController::class, 'update'])->name('.update');
    Route::delete('/hak-akses/{id}', [HakAksesController::class, 'destroy'])->name('hak-akses.destroy');
    
    // Resource route jika Anda ingin mengelola CRUD secara otomatis
    Route::resource('hak-akses', HakAksesController::class)->except('create', 'show', 'index', 'edit');
});


Route::get('/', 'HomeController@index')->name('home.index');

Route::get('/laporan-apbdes', 'AnggaranRealisasiController@laporan_apbdes')->name('laporan-apbdes');
Route::get('/layanan-surat', 'SuratController@layanan_surat')->name('layanan-surat');
Route::get('/pemerintahan-desa', 'PemerintahanDesaController@pemerintahan_desa')->name('pemerintahan-desa');
Route::get('/pemerintahan-desa/{pemerintahan_desa}', function () {
    return abort(404);
});
Route::get('/gallery', 'GalleryController@gallery')->name('gallery');
Route::get('/buat-surat/{id}/{slug}', 'CetakSuratController@create')->name('buat-surat');
// Route::get('/panduan', 'HomeController@panduan')->name('panduan');
Route::get('/statistik-penduduk', 'GrafikController@index')->name('statistik-penduduk');
Route::get('/statistik-penduduk/show', 'GrafikController@show')->name('statistik-penduduk.show');
Route::get('/anggaran-realisasi-cart', 'AnggaranRealisasiController@cart')->name('anggaran-realisasi.cart');
Route::post('/cetak-surat/{id}/{slug}', 'CetakSuratController@store')->name('cetak-surat.store');

Route::group(['middleware' => ['web', 'guest']], function () {
    Route::get('/masuk', 'AuthController@index')->name('masuk');
    Route::post('/masuk', 'AuthController@masuk');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::post('/keluar', 'AuthController@keluar')->name('keluar');
    Route::get('/pengaturan', 'UserController@pengaturan')->name('pengaturan');
    Route::get('/profil', 'UserController@profil')->name('profil');
    Route::patch('/update-pengaturan/{user}', 'UserController@updatePengaturan')->name('update-pengaturan');
    Route::patch('/update-profil/{user}', 'UserController@updateProfil')->name('update-profil');

    Route::get('/profil-desa', 'DesaController@index')->name('profil-desa');
    Route::patch('/update-desa/{desa}', 'DesaController@update')->name('update-desa');

    Route::get('/tambah-surat', 'SuratController@create')->name('surat.create');
    Route::patch('/cetakSurat/{cetak_surat}/arsip', 'CetakSuratController@arsip')->name('cetakSurat.arsip');
    Route::resource('/cetakSurat', 'CetakSuratController')->except('create', 'store', 'index');
    Route::resource('/surat', 'SuratController')->except('create');

    Route::get('/kelola-pemerintahan-desa', 'PemerintahanDesaController@index')->name('pemerintahan-desa.index');
    Route::get('/tambah-pemerintahan-desa', 'PemerintahanDesaController@create')->name('pemerintahan-desa.create');
    Route::get('/edit-pemerintahan-desa/{pemerintahan_desa}', 'PemerintahanDesaController@edit')->name('pemerintahan-desa.edit');
    Route::resource('/pemerintahan-desa', 'PemerintahanDesaController')->except('create', 'show', 'index', 'edit');


    Route::resource('/isiSurat', 'IsiSuratController')->except('index', 'create', 'edit', 'show');

    Route::post('/gallery/store', 'GalleryController@storeGallery')->name('gallery.storeGallery');
    Route::get('/kelola-gallery', 'GalleryController@index')->name('gallery.index');
    Route::resource('/gallery', 'GalleryController')->except('index', 'show', 'edit', 'update', 'create');

    Route::get('/tambah-slider', 'GalleryController@create')->name('slider.create')->middleware('auth','admin');
    Route::get('/slider', 'GalleryController@indexSlider')->name('slider.index')->middleware('auth','admin');

    Route::post('/video', 'VideoController@store')->name('video.store');
    Route::patch('/video/update', 'VideoController@update')->name('video.update');

    Route::get('/surat-harian', 'HomeController@suratHarian')->name('surat-harian');
    Route::get('/surat-bulanan', 'HomeController@suratBulanan')->name('surat-bulanan');
    Route::get('/surat-tahunan', 'HomeController@suratTahunan')->name('surat-tahunan');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

    Route::get('/tambah-penduduk', 'PendudukController@create')->name('penduduk.create');
    Route::get('/penduduk/{penduduk}', function () {
        return abort(404);
    });
    Route::resource('penduduk', 'PendudukController')->except('create', 'show');

    Route::get('/kelompok-jenis-anggaran/{kelompokJenisAnggaran}', 'AnggaranRealisasiController@kelompokJenisAnggaran');
    Route::get('/detail-jenis-anggaran/{id}', 'AnggaranRealisasiController@show')->name('detail-jenis-anggaran.show');
    Route::get('/tambah-anggaran-realisasi', 'AnggaranRealisasiController@create')->name('anggaran-realisasi.create');
    Route::get('/anggaran-realisasi/{anggaran_realisasi}', function () {
        return abort(404);
    });
    Route::resource('anggaran-realisasi', 'AnggaranRealisasiController')->except('create', 'show');

    // Laporan Realisasi
    Route::get('/tambah-dusun', 'DusunController@create')->name('dusun.create')->middleware('auth','admin','lurah');
    Route::resource('dusun', 'DusunController')->except('create', 'show')->middleware('auth','admin','lurah');
    Route::resource('detailDusun', 'DetailDusunController')->except('create', 'edit')->middleware('auth','admin','lurah');

    Route::get('/chart-surat/{id}', 'SuratController@chartSurat')->name('chart-surat');
});

Route::fallback(function () {
    abort(404);
});
