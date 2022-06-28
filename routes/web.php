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

Route::view('/user', 'user.user');
Route::view('/jurnal', 'jurnal.jurnal');
Route::view('/absen', 'absen.absen');
Route::view('/jabatan', 'jabatan.jabatan');
Route::view('/rekapan', 'absen.');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.guru');
    Route::get('/rpp-guru', [App\Http\Controllers\Guru\RppController::class, 'index'])->name('rpp.guru');
    Route::get('/jurnal-guru', [App\Http\Controllers\Guru\JurnalGuruController::class, 'index'])->name('jurnal.guru');
    Route::get('/jurnal-guru/create', [App\Http\Controllers\Guru\JurnalGuruController::class, 'create'])->name('jurnalCreate.guru');
    Route::post('/jurnal-guru/{id}',  [App\Http\Controllers\Guru\JurnalGuruController::class, 'save']);
    Route::get('/jurnal-guru/destroy/{id}', [App\Http\Controllers\Guru\JurnalGuruController::class, 'destroy'])->name('jurnal.Destroy');
    Route::get('/jurnal-guru/edit/{id}', [App\Http\Controllers\Guru\JurnalGuruController::class, 'edit'])->name('jurnalEdit.guru');
    Route::post('/jurnal-guru/edit/{id}', [App\Http\Controllers\Guru\JurnalGuruController::class, 'update'])->name('jurnalUpdate.guru');
    Route::get('/absen-datang-guru', [App\Http\Controllers\Guru\AbsenDatangController::class, 'index'])->name('absen-datang.guru');
    Route::get('/absen-datang-guru/create', [App\Http\Controllers\Guru\AbsenDatangController::class, 'create'])->name('absen-datangCreate.guru');
    Route::post('/absen-datang-guru/{id}',  [App\Http\Controllers\Guru\AbsenDatangController::class, 'save']);
    Route::get('/absen-datang/destroy/{id}', [App\Http\Controllers\Guru\AbsenDatangController::class, 'destroy'])->name('absen-datang.Destroy');
    Route::get('/absen-datang-guru/edit/{id}', [App\Http\Controllers\Guru\AbsenDatangController::class, 'edit'])->name('absen-datangEdit.guru');
    Route::post('/absen-datang-guru/edit/{id}', [App\Http\Controllers\Guru\AbsenDatangController::class, 'update'])->name('absen-datangUpdate.guru');
    Route::get('/absen-pulang-guru', [App\Http\Controllers\Guru\AbsenPulangController::class, 'index'])->name('absen-pulang.guru');
    Route::get('/absen-pulang-guru/create', [App\Http\Controllers\Guru\AbsenPulangController::class, 'create'])->name('absen-pulangCreate.guru');
    Route::post('/absen-pulang-guru/{id}',  [App\Http\Controllers\Guru\AbsenPulangController::class, 'save']);
    Route::get('/absen-pulang-guru/edit/{id}', [App\Http\Controllers\Guru\AbsenPulangController::class, 'edit'])->name('absen-pulangEdit.guru');
    Route::post('/absen-pulang-guru/update/{id}', [App\Http\Controllers\Guru\AbsenPulangController::class, 'update'])->name('absen-pulangUpdate.guru');
    Route::get('/absen-pulang/destroy/{id}', [App\Http\Controllers\Guru\AbsenPulangController::class, 'destroy'])->name('absen-pulang.Destroy');
    Route::get('/profile', [App\Http\Controllers\Guru\ProfileGuruController::class, 'index'])->name('profile');
    Route::post('/profile',  [App\Http\Controllers\Guru\ProfileGuruController::class, 'update']);
    Route::get('/rpp-guru', [App\Http\Controllers\Guru\RppController::class, 'index'])->name('rpp.guru');
    Route::get('/rpp-guru/create', [App\Http\Controllers\Guru\RppController::class, 'create'])->name('rppCreate.guru');
    Route::post('/rpp-guru/{id}',  [App\Http\Controllers\Guru\RppController::class, 'save']);
    Route::get('/rpp/destroy/{id}', [App\Http\Controllers\Guru\RppController::class, 'destroy'])->name('rpp-guru.Destroy');
    Route::get('/rpp-guru/edit/{id}', [App\Http\Controllers\Guru\RppController::class, 'edit'])->name('rppEdit.guru');
    Route::post('/rpp-guru/edit/{id}', [App\Http\Controllers\Guru\RppController::class, 'update'])->name('rppUpdate.guru');

    Route::get('/', [App\Http\Controllers\dashboardController::class, 'index'])->name('dashboard');
    Route::get('user', [userController::class, 'index'])->name('user.index');
    Route::get('jurnal', [jurnalController::class, 'index'])->name('jurnal.index');
    route::get('/rekapjurnal', [jurnalController::class, 'rekapan'])->name('jurnal.rekapan');
    route::get('/rekapjurnal/exportExcel', [jurnalController::class, 'exportExcel'])->name('jurnal.exportExcel');
    Route::get('absen', [absenController::class, 'index'])->name('absen.index');
    Route::get('rekapan', [absenController::class, 'rekapan'])->name('rekap.index');
    Route::post('absen_edit', [absenController::class, 'update'])->name('absen_edit');
    Route::get('/rekapan-pertanggal/{tglawal}/{tglakhir}', 'absenController@rekapanPertanggal')->name('rekapan-pertanggal');
    Route::get('/profileAdmin', [App\Http\Controllers\Guru\ProfileGuruController::class, 'indexAdmin'])->name('profile-admin');
    Route::post('/profileAdmin',  [App\Http\Controllers\Guru\ProfileGuruController::class, 'updateAdmin']);

    //create
    route::get('/tambahuser', [userController::class, 'create'])->name('user.userCreate');
    route::get('/tambahjurnal', [jurnalController::class, 'create'])->name('jurnal.jurnalCreate');
    route::get('/tambahabsen', [absenController::class, 'create'])->name('absen.absenCreate');

    //simpan data
    route::post('/user', [userController::class, 'store'])->name('user.store');
    route::post('/jurnal', [jurnalController::class, 'store'])->name('jurnal.store');
    route::post('/absen', [absenController::class, 'store'])->name('absen.store');

    //edit data
    route::get('/user/edit/{id}', [userController::class, 'edit'])->name('user.edit');
    route::get('/jurnal/edit/{id}', [jurnalController::class, 'edit'])->name('jurnal.edit');
    route::get('/absen/edit/{id}', [absenController::class, 'edit'])->name('absen.edit');

    //update data
    route::post('/user/edit/{id}', [userController::class, 'update'])->name('user.update');
    route::post('/jurnal/edit/{id}', [jurnalController::class, 'update'])->name('jurnal.update');
    route::post('/absen/edit/{id}', [absenController::class, 'update'])->name('absen.update');

    //delete data
    route::post('/user/delete/{id}', [userController::class, 'destroy'])->name('user.destroy');
    route::post('/jurnal/delete/{id}', [jurnalController::class, 'destroy'])->name('jurnal.destroy');
    route::post('/absen/delete/{id}', [absenController::class, 'destroy'])->name('absen.destroy');
