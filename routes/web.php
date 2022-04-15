<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
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

//user view
route::get('user',[userController::class, 'index'])->name('user.index');

//user create
route::get('/tambahuser',[userController::class, 'create'])->name('user.userCreate');

//simpan data
route::post('/user',[userController::class, 'store'])->name('user.store');

//edit data
route::get('/user/edit/{id}',[userController::class, 'edit'])->name('user.edit');

//update data
route::post('/user/edit/{id}',[userController::class, 'update'])->name('user.update');

//delete data
route::post('/user/delete/{id}',[userController::class, 'destroy'])->name('user.destroy');
