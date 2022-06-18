<?php
namespace App\Http\Controllers\Guru;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jurnal;
use Auth;

class JurnalGuruController extends Controller
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
        $jurnal = Jurnal::all();
        return view('guru.jurnalGuru', compact('jurnal'));

        //if(request()->input('tanggal')){
       //     $data = $data->where('tanggal',request()->input('tanggal'));
        //}
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
    
     /*
        public function store(Request $req){
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $file = $request->file('foto_kegiatan');
        if($file != ''){
            // JIKA GAMBAR DIUBAH
            DB::table('jurnal')->where('id',$id)->update([
                'nama' => $request->nama,
                'kelas' => $request->kelas,
                'uraian_tugas' => $request->uraian_tugas,
                'hasil' => $request->hasil,
                'kendala' => $request->kendala,
                'tindak_lanjut' => $request->tindak_lanjut,
                'foto_kegiatan' => $file->move('images'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }else{
            // JIKA TIDAK MENGUBAH GAMBAR
            DB::table('jurnal')->where('id',$id)->update([
                'nama' => $request->nama,
                'kelas' => $request->kelas,
                'uraian_tugas' => $request->uraian_tugas,
                'hasil' => $request->hasil,
                'kendala' => $request->kendala,
                'tindak_lanjut' => $request->tindak_lanjut,
                'foto_kegiatan' => $request->foto_kegiatan_old,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        return redirect('jurnal');

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