<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Alert;
use Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //untuk menampilkan index
        $data = User::all();
        $active = 'user';
        return view('user.user',['dataUser' => $data, 'active' => $active]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'user';
        return view('user.userCreate', compact('active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new User;
        $data ->name = $request->name;
        $data ->email = $request->email;
        $data->password = Hash::make($request->password);
        $data ->role = $request->role;
        $data ->save();

        alert()->success('User berhasil ditambahkan', 'Success');
        return redirect('/user');
    }

    public function edit($id)
    {
        $data = User::find($id);
        $active = 'user';
        return view('user.userEdit',compact('data', 'active'));
    }

    public function update(Request $request, $id)
    {
        $data = User::find($id);
        $data->name = $request->name;
        $data ->email = $request->email;
        $data->password = Hash::make($request->password);
        $data ->role = $request->role;
        $data->update();

        alert()->success('User berhasil diupdate', 'Success');
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('/user');
    }
}
