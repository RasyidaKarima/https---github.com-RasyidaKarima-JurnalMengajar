<?php
namespace App\Http\Controllers\Guru;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jurnal;
use App\Models\RPP;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;

class JurnalGuruController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $rpp = RPP::all();
        if ($request->ajax()) {
            $data = Jurnal::with('rpp');


            //Jurnal::select('*')
            //->where('user_id', Auth::user()->id)
            //->where('tanggal', Date("Y-m-d"))
            //->get();
            return DataTables::eloquent($data)
                ->addIndexColumn()
                ->addColumn('penjelasan', function (Post $post) {
                    return $jurnal->rpp->penjelasan;
                })
                ->addColumn('action', function ($data) {
                    $button = ' <a href="'. route("absen-datangEdit.guru", $data->id).'" class="edit btn btn-success " id="' . $data->id . '" ><i class="fa fa-edit"></i></a>';
                    $button .= ' <a href="'. route("absen-datang.Destroy", $data->id).'" class="hapus btn btn-danger" id="' . $data->id . '" ><i class="fa fa-trash"></i></a>';
                    return $button;
                })
                ->rawColumns(['foto', 'action'])
                ->make(true);
        }
        return view('guru.jurnalGuru', compact('rpp'));
    }

    public function create()
    {
        $rpp = RPP::select('*')
        ->where('user_id', Auth::user()->id)
        ->get();
        return view('guru.jurnalguruCreate', compact('rpp'));
    }

    public function save(Request $request, $id)
    {
        $date = Carbon::now();
        $user = User::where('id', Auth::user()->id)->first();
        $rpp = RPP::where('id', $id)>first();
        $jurnal = Jurnal::where('user_id', $user->id)
                ->where('rpp_id', $rpp->id)->first();
        $jurnal = new Jurnal;
        $jurnal->user_id = $user->id;
        $jurnal->rpp_id = $rpp->id;
        $jurnal->tanggal = $date;
        $jurnal->hasil = $request->hasil;
        $jurnal->kendala = $request->kendala;
        $jurnal->tindak_lanjut = $request->kendala;
        $file = $request->file('foto_kegiatan');
        //Mendapatkan nama file
        $nama_file = $file->getClientOriginalName();

        // Mendapatkan Extension File
        $extension = $file->getClientOriginalExtension();
    
        // Mendapatkan Ukuran File
        $ukuran_file = $file->getSize();
     
        // Proses Upload File
        $destinationPath = 'images\jurnal';
        $file->move($destinationPath,$file->getClientOriginalName());
        $jurnal->foto = $nama_file;
        $jurnal->save();
        alert()->success('Jurnal Berhasil Disimpan');
        return redirect('jurnal-guru');
    }

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