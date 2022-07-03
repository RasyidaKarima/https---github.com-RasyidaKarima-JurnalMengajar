<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Auth;
use Alert;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileKepsekController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();

    	return view('kepsek.profile', compact('user'));
    }

    public function update(Request $request)
    {
    	 $this->validate($request, [
            'password'  => 'confirmed',
        ]);

    	$user = User::where('id', Auth::user()->id)->first();
    	$user->name = $request->name;
    	$user->nip = $request->nip;
    	$user->jabatan = $request->jabatan;
        $user->kelas = $request->kelas;
    	$user->mapel = $request->mapel;
    	$user->update();

    	alert()->success('User berhasil diupdate', 'Success');
    	return redirect('profile');
    }
}