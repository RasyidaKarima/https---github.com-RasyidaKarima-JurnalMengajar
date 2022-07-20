<?php
namespace App\Http\Controllers\Guru;
use App\Http\Controllers\Controller;
use App\Models\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jurnal;
use App\Models\RPP;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class JurnalGuruController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $jurnals = Jurnal::select(['id','tanggal','hasil','kendala','rpp_id','tindak_lanjut','foto_kegiatan','status'])
                    ->where('user_id', Auth::user()->id)
                    ->where('tanggal', Date("Y-m-d"))
                    ->with(['rpp']);


            return DataTables::of($jurnals)
                ->addIndexColumn()
                ->editColumn('foto_kegiatan', function ($data) {
                    if($data->foto_kegiatan == null){
                        return ' ';
                    }else{
                        $url= asset('images/jurnal/'.$data->foto_kegiatan);
                        return '<img src="'.$url.'" width="70" alt="..." />';
                    }
                })
                ->addColumn('action', function ($data) {
                    if($data->status == 'belum divalidasi' || $data->status == 'Belum Divalidasi' ||  $data->status == 'sudah divalidasi terdapat kesalahan'){
                        $button = ' <a href="'. route("jurnalEdit.guru", $data->id).'" class="edit btn btn-success btn-sm " id="' . $data->id . '" ><i class="fa fa-edit"></i></a>';
                        $button .= ' <a href="'. route("jurnal.Destroy", $data->id).'" class="hapus btn btn-danger btn-sm" id="' . $data->id . '" ><i class="fa fa-trash"></i></a>';
                        return $button;
                    }else{
                        return ' ';
                    }
                })
                ->rawColumns(['foto_kegiatan', 'action'])
                ->make(true);
        }
        $rpp = RPP::select('*')
        ->where('user_id', Auth::user()->id)
        ->get();
        $date = now()->format('Y-m-d');
        $absen = Absen::where('tanggal', '=', $date)->count();
        $jurnals = Jurnal::where('user_id', Auth::user()->id)
                    ->where('tanggal', Date("Y-m-d"))
                    ->with(['rpp'])->get();

        return view('guru.jurnalGuru', compact('rpp','absen','jurnals'));
    }

    public function riwayat(Request $request)
    {
        if ($request->ajax()) {
            $jurnals = Jurnal::select(['id','tanggal','hasil','kendala','rpp_id','tindak_lanjut','foto_kegiatan','status'])
                    ->where('user_id', Auth::user()->id)
                    ->with(['rpp']);

            return DataTables::of($jurnals)
                ->addIndexColumn()
                ->editColumn('foto_kegiatan', function ($data) {
                    if($data->foto_kegiatan == null){
                        return ' ';
                    }else{
                        $url= asset('images/jurnal/'.$data->foto_kegiatan);
                        return '<img src="'.$url.'" width="70" alt="..." />';
                    }
                })
                ->rawColumns(['foto_kegiatan'])
                ->make(true);
        }
        $rpp = RPP::select('*')
        ->where('user_id', Auth::user()->id)
        ->get();
        return view('guru.riwayatjurnal', compact('rpp'));
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
        $request->validate([
            'rpp_id' => 'required',
        ], [
            'rpp_id.required' => 'Rpp tidak boleh kosong'
        ]);



        $file = $request->file('foto_kegiatan');
        if($request->file('foto_kegiatan') != null){

            $ext_foto = $file->extension();
            $filename = $file->move(public_path() . '/images/jurnal/', $file->getClientOriginalName());
            $date = Carbon::now();
            $user = User::where('id', Auth::user()->id)->first();
            $jurnal = Jurnal::where('user_id', $user->id)->first();

            $jurnal = new Jurnal;
            $jurnal->user_id = $user->id;
            $jurnal->rpp_id = $request->rpp_id;
            $jurnal->tanggal = $date;
            $jurnal->hasil = $request->hasil;
            $jurnal->kendala = $request->kendala;
            $jurnal->tindak_lanjut = $request->tindak_lanjut;
            $jurnal->foto_kegiatan  = $file->getClientOriginalName();
            $jurnal->save();
        }else{
            $date = Carbon::now();
            $user = User::where('id', Auth::user()->id)->first();
            $jurnal = Jurnal::where('user_id', $user->id)->first();
            $jurnal = new Jurnal;
            $jurnal->user_id = $user->id;
            $jurnal->rpp_id = $request->rpp_id;
            $jurnal->tanggal = $date;
            $jurnal->hasil = $request->hasil;
            $jurnal->kendala = $request->lanjut;
            $jurnal->tindak_lanjut = $request->tindak_kendala;
            $jurnal->save();
        }

        alert()->success('Jurnal Berhasil Disimpan');
        return redirect('jurnal-guru');
    }

    public function edit($id)
    {

        $jurnal = Jurnal::find($id);
        $rpp = RPP::select('*')
        ->where('user_id', Auth::user()->id)
        ->get();
        return view('guru.jurnalguruedit',compact('jurnal','rpp'));
    }

    public function update(Request $request, $id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $file = $request->file('foto_kegiatan');
        if($request->file('foto_kegiatan') != null){

            $ext_foto = $file->extension();
            $filename = $file->move(public_path() . '/images/jurnal/', $file->getClientOriginalName());
            $date = Carbon::now();
            $jurnal = Jurnal::where('id', $id)->first();
            $jurnal->rpp_id         = $request->rpp_id;
            $jurnal->tanggal        = $date;
            $jurnal->hasil          = $request->hasil;
            $jurnal->kendala        = $request->kendala;
            $jurnal->tindak_lanjut        = $request->tindak_lanjut;
            $jurnal->foto_kegiatan  = $file->getClientOriginalName();
            $jurnal->updated_at     = date('Y-m-d H:i:s');
            $jurnal->save();
        }else{
            $date = Carbon::now();
            DB::table('jurnal')->where('id',$id)->update([
                'tanggal'       => $date,
                'rpp_id'        => $request->rpp_id,
                'hasil'         => $request->hasil,
                'kendala'       => $request->kendala,
                'foto_kegiatan' => $request->foto_old,
                'tindak_lanjut' => $request->tindak_lanjut,
                'updated_at'    => date('Y-m-d H:i:s')
            ]);
        }
        alert()->success('Jurnal Telah Diupdate', 'Success');
        return redirect('jurnal-guru');

    }


    public function destroy($id)
    {
        $jurnal= Jurnal::find($id);
        $jurnal->delete();
        return redirect('jurnal-guru');
    }
}
