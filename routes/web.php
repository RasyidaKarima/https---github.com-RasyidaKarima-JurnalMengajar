<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\jabatanController;
use App\Http\Controllers\jurnalController;
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

Route::get('/', function () {
    return view('home');
});

route::view('/user','user.user');
route::view('/jurnal','jurnal.jurnal');
route::view('/absen','absen.absen');
route::view('/jabatan','jabatan.jabatan');

//view
route::get('user',[userController::class, 'index'])->name('user.index');
route::get('jabatan',[jabatanController::class, 'index'])->name('jabatan.index');
route::get('jurnal',[jurnalController::class, 'index'])->name('jurnal.index');

//create
route::get('/tambahuser',[userController::class, 'create'])->name('user.userCreate');
route::get('/tambahjabatan',[jabatanController::class, 'create'])->name('jabatan.jabatanCreate');
route::get('/tambahjurnal',[jurnalController::class, 'create'])->name('jurnal.jurnalCreate');

//simpan data
route::post('/user',[userController::class, 'store'])->name('user.store');
route::post('/jabatan',[jabatanController::class, 'store'])->name('jabatan.store');
route::post('/jurnal',[jurnalController::class, 'store'])->name('jurnal.store');

//edit data
route::get('/user/edit/{id}',[userController::class, 'edit'])->name('user.edit');
route::get('/jabatan/edit/{id}',[jabatanController::class, 'edit'])->name('jabatan.edit');
route::get('/jurnal/edit/{id}',[jurnalController::class, 'edit'])->name('jurnal.edit');

//update data
route::post('/user/edit/{id}',[userController::class, 'update'])->name('user.update');
route::post('/jabatan/edit/{id}',[jabatanController::class, 'update'])->name('jabatan.update');
route::post('/jurnal/edit/{id}',[jurnalController::class, 'update'])->name('jurnal.update');

//delete data
route::post('/user/delete/{id}',[userController::class, 'destroy'])->name('user.destroy');
route::post('/jabatan/delete/{id}',[jabatanController::class, 'destroy'])->name('jabatan.destroy');
route::post('/jurnal/delete/{id}',[jurnalController::class, 'destroy'])->name('jurnal.destroy');
