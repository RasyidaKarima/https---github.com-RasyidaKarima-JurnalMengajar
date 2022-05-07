<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Absen;

class absenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absen = Absen::all();
        return view('absen.absen',['dataAbsen' => $absen]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('absen.absenCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('lampiran');
        DB::table('absen')->insert([
            'id_users' => $request->id_users,
            'jam_masuk' => date('Y-m-d H:i:s'),
            'tanggal_absen' =>  date('Y-m-d H:i:s'),
            'status' => $request -> status,
            'lampiran' => $file->move('images')
        ]);
        return redirect('absen');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $absen = Absen::find($id);
        return view('absen.absenEdit',compact('absen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $file = $request->file('lampiran');
        if($file != ''){
            // JIKA GAMBAR DIUBAH
            DB::table('absen')->where('id',$id)->update([
                'id_users' => $request->id_users,
                'jam_masuk' => date('Y-m-d H:i:s'),
                'tanggal_absen' =>  date('Y-m-d H:i:s'),
                'status' => $request -> status,
                'lampiran' => $file->move('images'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }else{
            // JIKA TIDAK MENGUBAH GAMBAR
            DB::table('absen')->where('id',$id)->update([
                'id_users' => $request->id_users,
                'jam_masuk' => date('Y-m-d H:i:s'),
                'tanggal_absen' =>  date('Y-m-d H:i:s'),
                'status' => $request -> status,
                'lampiran' => $request->lampiran_old,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        return redirect('absen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absen = Absen::find($id);
        $absen ->delete();
        return redirect('/absen');
    }
}
