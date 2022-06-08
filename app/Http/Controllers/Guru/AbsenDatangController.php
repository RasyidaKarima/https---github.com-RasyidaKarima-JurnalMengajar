<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\AbsenDatang;
use Auth;
use Alert;

class AbsenDatangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index()
   {
       $datang = AbsenDatang::all();
       return view('guru.absendatang', compact('datang'));
   }

   public function create()
   {
       return view('guru.absendatangCreate');
   }
   /*
    public function store(Request $req, $id){
       $file = $req->file('foto');
       DB::table('absensi_datang')->insert([
           'nama' => $req->nama,
           'kelas' => $req->kelas,
           'uraian_tugas' => $req->uraian_tugas,
           'hasil' => $req->hasil,
           'kendala' => $req->kendala,
           'tindak_lanjut' => $req->tindak_lanjut,
           'foto_kegiatan' => $file->move('images')
       ]);
       return redirect('jurnal-guru');
   }*/

   public function save(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $datang = AbsenDatang::where('user_id', $user->id)->first();

        $datang = new AbsenDatang;
        $datang->user_id = $user->id;
        $datang->tanggal = $request->tanggal;
        $datang->status = $request->status;
        $datang->kondisi = $request->kondisi;
        $datang->foto = $request->foto;
        $datang->save();
        alert()->success('Absen Kedatangan Berhasil Disimpan');
        return redirect('absen-datang-guru');
    }

   public function edit($id)
   {

       $datang = AbsenDatang::find($id);
       return view('guru.absendatangEdit',compact('datang'));
   }

    public function update(Request $request, $id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $file = $request->file('foto');
        if($file != ''){
            // JIKA GAMBAR DIUBAH
            DB::table('absen_datang')->where('id',$id)->update([
                'tanggal' => $request->tanggal,
                'status' => $request->status,
                'kondisi' => $request->kondisi,
                'foto' => $file->move('images'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }else{
            // JIKA TIDAK MENGUBAH GAMBAR
            DB::table('absen_datang')->where('id',$id)->update([
                'tanggal' => $request->tanggal,
                'status' => $request->status,
                'kondisi' => $request->kondisi,
                'foto' => $request->foto_old,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        return redirect('absen-datang-guru');

    }

   public function delete($id){
    $datang = AbsenDatang::where('id', $id)->first();
    $datang->delete();
    alert()->error('Absen Kedatangan telah dihapus', 'Deleted');
    return redirect('absen-datang-guru');
    }
}