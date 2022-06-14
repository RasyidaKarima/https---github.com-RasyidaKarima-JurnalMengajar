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
Route::view('/', 'dashboard.index');
Route::view('/rekapan', 'absen.');

//role guru
Route::view('/home', 'guru.home')->name('home.guru');
Route::get('/rpp-guru', [App\Http\Controllers\Guru\RppController::class, 'index'])->name('rpp.guru');
Route::get('/jurnal-guru', [App\Http\Controllers\Guru\JurnalGuruController::class, 'index'])->name('jurnal.guru');
Route::get('/absen-datang-guru', [App\Http\Controllers\Guru\AbsenDatangController::class, 'index'])->name('absen-datang.guru');
Route::get('/absen-datang-guru/create', [App\Http\Controllers\Guru\AbsenDatangController::class, 'create'])->name('absen-datangCreate.guru');
Route::post('/absen-datang-guru/{id}',  [App\Http\Controllers\Guru\AbsenDatangController::class, 'save']);
Route::post('/absen-datang-guru/destroy/{id}', [App\Http\Controllers\Guru\AbsenDatangController::class, 'delete'])->name('absen-datangDestroy.guru');
Route::get('/absen-datang-guru/edit/{id}', [App\Http\Controllers\Guru\AbsenDatangController::class, 'edit'])->name('absen-datangEdit.guru');
Route::post('/absen-datang-guru/edit/{id}', [App\Http\Controllers\Guru\AbsenDatangController::class, 'update'])->name('absen-datangUpdate.guru');

//view
Route::get('user', [userController::class, 'index'])->name('user.index');
Route::get('jabatan', [jabatanController::class, 'index'])->name('jabatan.index');
Route::get('jurnal', [jurnalController::class, 'index'])->name('jurnal.index');
route::get('rekapjurnal', [jurnalController::class, 'rekapan'])->name('jurnal.rekapan');
route::get('rekapjurnal/exportExcel', [jurnalController::class, 'exportExcel'])->name('jurnal.exportExcel');
Route::get('absen', [absenController::class, 'index'])->name('absen.index');
Route::get('rekapan', [absenController::class, 'rekapan'])->name('absen.index');
Route::post('absen_edit', [absenController::class, 'update'])->name('absen_edit');
Route::get('/rekapan-pertanggal/{tglawal}/{tglakhir}', 'absenController@rekapanPertanggal')->name('rekapan-pertanggal');

//create
route::get('/tambahuser', [userController::class, 'create'])->name('user.userCreate');
route::get('/tambahjabatan', [jabatanController::class, 'create'])->name('jabatan.jabatanCreate');
route::get('/tambahjurnal', [jurnalController::class, 'create'])->name('jurnal.jurnalCreate');
route::get('/tambahabsen', [absenController::class, 'create'])->name('absen.absenCreate');

//simpan data
route::post('/user', [userController::class, 'store'])->name('user.store');
route::post('/jabatan', [jabatanController::class, 'store'])->name('jabatan.store');
route::post('/jurnal', [jurnalController::class, 'store'])->name('jurnal.store');
route::post('/absen', [absenController::class, 'store'])->name('absen.store');

//edit data
route::get('/user/edit/{id}', [userController::class, 'edit'])->name('user.edit');
route::get('/jabatan/edit/{id}', [jabatanController::class, 'edit'])->name('jabatan.edit');
route::get('/jurnal/edit/{id}', [jurnalController::class, 'edit'])->name('jurnal.edit');
route::get('/absen/edit/{id}', [absenController::class, 'edit'])->name('absen.edit');

//update data
route::post('/user/edit/{id}', [userController::class, 'update'])->name('user.update');
route::post('/jabatan/edit/{id}', [jabatanController::class, 'update'])->name('jabatan.update');
route::post('/jurnal/edit/{id}', [jurnalController::class, 'update'])->name('jurnal.update');
route::post('/absen/edit/{id}', [absenController::class, 'update'])->name('absen.update');

//delete data
route::post('/user/delete/{id}', [userController::class, 'destroy'])->name('user.destroy');
route::post('/jabatan/delete/{id}', [jabatanController::class, 'destroy'])->name('jabatan.destroy');
route::post('/jurnal/delete/{id}', [jurnalController::class, 'destroy'])->name('jurnal.destroy');
route::post('/absen/delete/{id}', [absenController::class, 'destroy'])->name('absen.destroy');

Route::get('/check', [DashboardController::class, 'arsipChart']);
