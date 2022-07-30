<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\jabatanController;
use App\Http\Controllers\jurnalController;
use App\Http\Controllers\absenController;
use App\Http\Controllers\dashboardController;
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

Auth::routes();

    //role guru
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.guru');
    Route::get('/jurnal-guru', [App\Http\Controllers\Guru\JurnalGuruController::class, 'index'])->name('jurnal.guru');
    Route::get('/jurnal-guru/riwayat', [App\Http\Controllers\Guru\JurnalGuruController::class, 'riwayat'])->name('jurnal-riwayat.guru');
    Route::get('/jurnal-guru/create', [App\Http\Controllers\Guru\JurnalGuruController::class, 'create'])->name('jurnalCreate.guru');
    Route::post('/jurnal-guru/{id}',  [App\Http\Controllers\Guru\JurnalGuruController::class, 'save']);
    Route::get('/jurnal-guru/destroy/{id}', [App\Http\Controllers\Guru\JurnalGuruController::class, 'destroy'])->name('jurnal.Destroy');
    Route::get('/jurnal-guru/edit/{id}', [App\Http\Controllers\Guru\JurnalGuruController::class, 'edit'])->name('jurnalEdit.guru');
    Route::post('/jurnal-guru/edit/{id}', [App\Http\Controllers\Guru\JurnalGuruController::class, 'update'])->name('jurnalUpdate.guru');
    Route::get('/absen-guru', [App\Http\Controllers\Guru\AbsenController::class, 'index'])->name('absen.guru');
    Route::get('/absen-guru/riwayat', [App\Http\Controllers\Guru\AbsenController::class, 'riwayat'])->name('absen-riwayat.guru');
    Route::get('/absen-guru/create', [App\Http\Controllers\Guru\AbsenController::class, 'create'])->name('absen-Create.guru');
    Route::post('/absen-guru/{id}',  [App\Http\Controllers\Guru\AbsenController::class, 'save']);
    Route::get('/absen/destroy/{id}', [App\Http\Controllers\Guru\AbsenController::class, 'destroy'])->name('absen.Destroy');
    Route::get('/absen-guru/edit/{id}', [App\Http\Controllers\Guru\AbsenController::class, 'edit'])->name('absen-Edit.guru');
    Route::post('/absen-guru/edit/{id}', [App\Http\Controllers\Guru\AbsenController::class, 'update'])->name('absen-Update.guru');
    Route::get('/profile', [App\Http\Controllers\Guru\ProfileGuruController::class, 'index'])->name('profile');
    Route::post('/profile',  [App\Http\Controllers\Guru\ProfileGuruController::class, 'update']);
    Route::get('/rpp-guru', [App\Http\Controllers\Guru\RppController::class, 'index'])->name('rpp.guru');
    Route::get('/rpp-guru/create', [App\Http\Controllers\Guru\RppController::class, 'create'])->name('rppCreate.guru');
    Route::post('/rpp-guru/{id}',  [App\Http\Controllers\Guru\RppController::class, 'save']);
    Route::get('/rpp-guru/destroy/{id}', [App\Http\Controllers\Guru\RppController::class, 'destroy'])->name('rpp-guru.Destroy');
    Route::get('/rpp-guru/edit/{id}', [App\Http\Controllers\Guru\RppController::class, 'edit'])->name('rppEdit.guru');
    Route::post('/rpp-guru/edit/{id}', [App\Http\Controllers\Guru\RppController::class, 'update'])->name('rppUpdate.guru');

    //route kepala sekolah
    Route::get('/home-kepsek', [App\Http\Controllers\HomeKepsekController::class, 'index'])->name('home.kepsek');
    Route::get('/validasi-kepsek', [App\Http\Controllers\Kepsek\ValidasiJurnalController::class, 'index'])->name('validasi.kepsek');
    Route::get('/validasi-kepsek/{id}', [App\Http\Controllers\Kepsek\ValidasiJurnalController::class, 'validasi'])->name('jurnal.validasi');
    Route::post('/validasi-update/{id}', [App\Http\Controllers\Kepsek\ValidasiJurnalController::class, 'updateValidasi'])->name('validasi.update');
    Route::get('/jurnal-kepsek', [App\Http\Controllers\Kepsek\JurnalKepsekController::class, 'index'])->name('jurnal.kepsek');
    Route::get('/jurnal-kepsek/riwayat', [App\Http\Controllers\Kepsek\JurnalKepsekController::class, 'riwayat'])->name('jurnal-riwayat.kepsek');
    Route::get('/jurnal-kepsek/create', [App\Http\Controllers\Kepsek\JurnalKepsekController::class, 'create'])->name('jurnalCreate.kepsek');
    Route::post('/jurnal-kepsek/{id}',  [App\Http\Controllers\Kepsek\JurnalKepsekController::class, 'save']);
    Route::get('/jurnal-kepsek/destroy/{id}', [App\Http\Controllers\Kepsek\JurnalKepsekController::class, 'destroy'])->name('jurnal-kepsek.Destroy');
    Route::get('/jurnal-kepsek/edit/{id}', [App\Http\Controllers\Kepsek\JurnalKepsekController::class, 'edit'])->name('jurnalEdit.kepsek');
    Route::post('/jurnal-kepsek/edit/{id}', [App\Http\Controllers\Kepsek\JurnalKepsekController::class, 'update'])->name('jurnalUpdate.kepsek');
    Route::get('/absen-kepsek', [App\Http\Controllers\Kepsek\AbsenController::class, 'index'])->name('absen.kepsek');
    Route::get('/absen-kepsek/riwayat', [App\Http\Controllers\Kepsek\AbsenController::class, 'riwayat'])->name('absen-riwayat.kepsek');
    Route::get('/absen-kepsek/create', [App\Http\Controllers\Kepsek\AbsenController::class, 'create'])->name('absen-Create.kepsek');
    Route::post('/absen-kepsek/{id}',  [App\Http\Controllers\Kepsek\AbsenController::class, 'save']);
    Route::get('/absen-kepsek/destroy/{id}', [App\Http\Controllers\Kepsek\AbsenController::class, 'destroy'])->name('absen-kepsek.Destroy');
    Route::get('/absen-kepsek/edit/{id}', [App\Http\Controllers\Kepsek\AbsenController::class, 'edit'])->name('absen-Edit.kepsek');
    Route::post('/absen-kepsek/edit/{id}', [App\Http\Controllers\Kepsek\AbsenController::class, 'update'])->name('absen-Update.kepsek');
    Route::get('/profile-kepsek', [App\Http\Controllers\Kepsek\ProfileKepsekController::class, 'index'])->name('profile.kepsek');
    Route::post('/profile-kepsek',  [App\Http\Controllers\Kepsek\ProfileKepsekController::class, 'update']);
    Route::get('/rpp-kepsek', [App\Http\Controllers\Kepsek\RppController::class, 'index'])->name('rpp.kepsek');
    Route::get('/rpp-kepsek/create', [App\Http\Controllers\Kepsek\RppController::class, 'create'])->name('rppCreate.kepsek');
    Route::post('/rpp-kepsek/{id}',  [App\Http\Controllers\Kepsek\RppController::class, 'save']);
    Route::get('/rpp-kepsek/destroy/{id}', [App\Http\Controllers\Kepsek\RppController::class, 'destroy'])->name('rpp-kepsek.Destroy');
    Route::get('/rpp-kepsek/edit/{id}', [App\Http\Controllers\Kepsek\RppController::class, 'edit'])->name('rppEdit.kepsek');
    Route::post('/rpp-kepsek/edit/{id}', [App\Http\Controllers\Kepsek\RppController::class, 'update'])->name('rppUpdate.kepsek');
    Route::get('/signature-pad', [App\Http\Controllers\SignatureController::class, 'index'])->name('signature');
    Route::post('/signature-pad', [App\Http\Controllers\SignatureController::class, 'save'])->name('signpad.save');

    //route admin
    Route::get('/', [App\Http\Controllers\dashboardController::class, 'index'])->name('dashboard');
    Route::get('user', [userController::class, 'index'])->name('user.index');
    Route::get('/tambahuser', [userController::class, 'create'])->name('user.userCreate');
    Route::post('/user', [userController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [userController::class, 'edit'])->name('user.edit');
    Route::post('/user/edit/{id}', [userController::class, 'update'])->name('user.update');
    Route::post('/user/delete/{id}', [userController::class, 'destroy'])->name('user.destroy');
    Route::get('/jurnal', [jurnalController::class, 'index'])->name('jurnal.index');
    Route::get('/jurnal/exportWord', [jurnalController::class, 'exportWord'])->name('jurnal.exportWord');
    Route::get('/tanda-tangan', [App\Http\Controllers\tandatanganController::class, 'index'])->name('ttd.index');
    Route::get('/rpp', [App\Http\Controllers\rppController::class, 'index'])->name('rpp.index');
    Route::get('absen', [absenController::class, 'index'])->name('absen.index');
    Route::get('rekapan', [absenController::class, 'rekapan'])->name('rekap.index');
    Route::get('/cetak-jurnal', [jurnalController::class, 'cetak'])->name('cetak.index');
    Route::post('absen_edit', [absenController::class, 'update'])->name('absen_edit');
    Route::get('/cetak-pertanggal/{tglawal}', 'jurnalController@cetakPertanggal')->name('cetak-pertanggal');
    Route::post('/cetak-pertanggal', 'jurnalController@cetakPertanggal')->name('cetak-tanggal');
    Route::get('/rekapan-pertanggal/{tglawal}/{tglakhir}', 'absenController@rekapanPertanggal')->name('rekapan-pertanggal');
    Route::get('/profileAdmin', [App\Http\Controllers\Guru\ProfileGuruController::class, 'indexAdmin'])->name('profile-admin');
    Route::post('/profileAdmin',  [App\Http\Controllers\Guru\ProfileGuruController::class, 'updateAdmin']);
