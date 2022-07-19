<?php
namespace App\Http\Controllers\Kepsek;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jurnal;
use App\Models\RPP;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;

class ValidasiJurnalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $jurnals = Jurnal::join('users', 'users.id', '=', 'jurnal.user_id')
                                ->join('rpp', 'rpp.id', '=', 'jurnal.rpp_id')
                                ->get(['jurnal.*','rpp.penjelasan', 'users.name', 'users.kelas']);

            return DataTables::of($jurnals)
                ->addIndexColumn()
                ->addColumn('name', function ($data){
                    return $data->name;
                })
                ->editColumn('foto_kegiatan', function ($data) {
                    if($data->foto_kegiatan == null){
                        return ' ';
                    }else{
                        $url= asset('images/jurnal/'.$data->foto_kegiatan);
                        return '<img src="'.$url.'" width="70" alt="..." />';
                    }
                })
                ->addColumn('action', function ($data) {
                    if($data->status == 'belum divalidasi' || $data->status == 'Belum Divalidasi'){
                        // $button  = ' <a href="'. route("jurnal-validasi.kepsek",$data->id).'" class="validasi btn btn-warning" id="' .$data->id. '"  > validasi </a>';
                        $button  = ' <a href="'. route("jurnal.validasi", $data->id).'" class="validasi btn btn-warning" id="' .$data->id. '"  > validasi </a>';
                        $button .= ' <a href="'. route("jurnalEdit.kepsek", $data->id).'" class="edit btn btn-success btn-sm " id="' . $data->id . '" ><i class="fa fa-edit"></i></a>';
                        $button .= ' <a href="'. route("jurnal-kepsek.Destroy", $data->id).'" class="hapus btn btn-danger btn-sm" id="' . $data->id . '" ><i class="fa fa-trash"></i></a>';
                        return $button;
                    }else{
                        return ' jurnal sudah benar';
                    }
                })
                ->rawColumns(['foto_kegiatan', 'action','name'])
                ->make(true);
        }
        $rpp = RPP::select('*')
        ->get();
        $user = User::select('*')
        ->get();
        return view('kepsek.validasijurnal', compact('rpp', 'user'));
    }

    public function validasi($id)
    {
        $jurnal = Jurnal::find($id);
        $rpp = RPP::select('*')
        ->get();
        return view('kepsek.validasikepsek',compact('jurnal','rpp'));
    }

    public function edit($id)
    {
        $jurnal = Jurnal::find($id);
        $rpp = RPP::select('*')
        ->get();
        return view('kepsek.jurnalkepsekedit',compact('jurnal','rpp'));
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
            $jurnal->tindak_lanjut  = $request->tindak_lanjut;
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
        return redirect('jurnal-kepsek');

    }


    public function destroy($id)
    {
        $jurnal= Jurnal::find($id);
        $jurnal->delete();
        return redirect('jurnal-kepsek');
    }

    public function updateValidasi(Request $request, $id){
        $jurnal = Jurnal::where('id',$id)->update([
            'status' => $request ->status,
            'pesan'  => $request ->pesan,
        ]);
        alert()->success('Jurnal Telah Diupdate', 'Success');
        return redirect('validasi-kepsek');
    }
}
