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

route::view('/user','user.user');
route::view('/jurnal','jurnal.jurnal');
route::view('/absen','absen.absen');
route::view('/jabatan','jabatan.jabatan');
route::view('/dashboard','dashboard');
route::view('/rekapan','absen.');
route::view('/home','guru.home')->name('home.guru');
route::view('/jurnal-guru','guru.jurnalguru')->name('jurnal.guru');


//view
route::get('user',[userController::class, 'index'])->name('user.index');
route::get('jabatan',[jabatanController::class, 'index'])->name('jabatan.index');
route::get('jurnal',[jurnalController::class, 'index'])->name('jurnal.index');
route::get('absen',[absenController::class, 'index'])->name('absen.index');
route::get('rekapan',[absenController::class, 'rekapan'])->name('absen.index');
Route::get('/rekapan-pertanggal/{tglawal}/{tglakhir}','absenController@rekapanPertanggal')->name('rekapan-pertanggal');




//create
route::get('/tambahuser',[userController::class, 'create'])->name('user.userCreate');
route::get('/tambahjabatan',[jabatanController::class, 'create'])->name('jabatan.jabatanCreate');
route::get('/tambahjurnal',[jurnalController::class, 'create'])->name('jurnal.jurnalCreate');
route::get('/tambahabsen',[absenController::class, 'create'])->name('absen.absenCreate');

//simpan data
route::post('/user',[userController::class, 'store'])->name('user.store');
route::post('/jabatan',[jabatanController::class, 'store'])->name('jabatan.store');
route::post('/jurnal',[jurnalController::class, 'store'])->name('jurnal.store');
route::post('/absen',[absenController::class, 'store'])->name('absen.store');


//edit data
route::get('/user/edit/{id}',[userController::class, 'edit'])->name('user.edit');
route::get('/jabatan/edit/{id}',[jabatanController::class, 'edit'])->name('jabatan.edit');
route::get('/jurnal/edit/{id}',[jurnalController::class, 'edit'])->name('jurnal.edit');
route::get('/absen/edit/{id}',[absenController::class, 'edit'])->name('absen.edit');

//update data
route::post('/user/edit/{id}',[userController::class, 'update'])->name('user.update');
route::post('/jabatan/edit/{id}',[jabatanController::class, 'update'])->name('jabatan.update');
route::post('/jurnal/edit/{id}',[jurnalController::class, 'update'])->name('jurnal.update');
route::post('/absen/edit/{id}',[absenController::class, 'update'])->name('absen.update');

//delete data
route::post('/user/delete/{id}',[userController::class, 'destroy'])->name('user.destroy');
route::post('/jabatan/delete/{id}',[jabatanController::class, 'destroy'])->name('jabatan.destroy');
route::post('/jurnal/delete/{id}',[jurnalController::class, 'destroy'])->name('jurnal.destroy');
route::post('/absen/delete/{id}',[absenController::class, 'destroy'])->name('absen.destroy');



Route::get('/check', [DashboardController::class, 'arsipChart']);

