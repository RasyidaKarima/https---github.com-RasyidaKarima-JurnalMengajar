<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jurnal;

class jurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurnal = Jurnal::all();
        return view('jurnal.jurnal',['dataJurnal' => $jurnal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurnal.jurnalCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jurnal = new Jurnal;
        $jurnal->nama = $request->nama;
        $jurnal->kelas = $request->kelas;
        $jurnal->uraian_tugas = $request->uraian_tugas;
        $jurnal->hasil = $request->hasil;
        $jurnal->kendala = $request->kendala;
        $jurnal->tindak_lanjut= $request->tindak_lanjut;
        $jurnal->foto_kegiatan = $request->foto_kegiatan;
        $jurnal->save();
        return redirect('/jurnal');
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
        $jurnal = Jurnal::find($id);
        return view('jurnal.jurnalEdit',compact('jurnal'));
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
        $jurnal = Jurnal::find($id);
        $jurnal->nama = $request->nama;
        $jurnal->kelas = $request->kelas;
        $jurnal->uraian_tugas = $request->uraian_tugas;
        $jurnal->hasil = $request->hasil;
        $jurnal->kendala = $request->kendala;
        $jurnal->tindak_lanjut= $request->tindak_lanjut;
        $jurnal->foto_kegiatan = $request->foto_kegiatan;
        $jurnal->update();
        return redirect('/jurnal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurnal= Jurnal::find($id);
        $jurnal->delete();
        return redirect('/jurnal');
    }
}
