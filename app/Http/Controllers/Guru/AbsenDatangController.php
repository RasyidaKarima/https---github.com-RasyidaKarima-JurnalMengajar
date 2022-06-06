<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AbsenDatang;

class AbsenDatangController extends Controller
{
    
   public function index()
   {
       $datang = AbsenDatang::all();
       return view('guru.absendatang', compact('datang'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('guru.absendatangCreate');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   
    /*
       public function store(Request $req, $id){
           $file = $req->file('foto_kegiatan');
           DB::table('jurnal')->insert([
               'nama' => $req->nama,
               'kelas' => $req->kelas,
               'uraian_tugas' => $req->uraian_tugas,
               'hasil' => $req->hasil,
               'kendala' => $req->kendala,
               'tindak_lanjut' => $req->tindak_lanjut,
               'foto_kegiatan' => $file->move('images')
           ]);
           return redirect('jurnal-guru');
       }
        */

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