<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Absen;
use Alert;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;


class AbsenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Absen::select('*')
            ->where('user_id', Auth::user()->id)
            ->where('tanggal', Date("Y-m-d"))
            ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('foto', function ($data) {
                    $url= asset('storage/'.$data->foto);
                    return '<img src="'.$url.'" width="70" alt="..." />'; 
                })
                ->addColumn('action', function ($data) {
                    $button = ' <a href="'. route("absen-Edit.guru", $data->id).'" class="edit btn btn-success " id="' . $data->id . '" ><i class="fa fa-edit"></i></a>';
                    $button .= ' <a href="'. route("absen.Destroy", $data->id).'" class="hapus btn btn-danger" id="' . $data->id . '" ><i class="fa fa-trash"></i></a>';
                    return $button;
                })
                ->rawColumns(['foto', 'action'])
                ->make(true);
        }

        $date = now()->format('Y-m-d');
        $absen = Absen::where('tanggal', $date)
                        ->where('user_id', Auth::user()->id)->count();
        return view('guru.absendatang', compact('absen'));
    }

    public function riwayat(Request $request)
    {
        if ($request->ajax()) {
            $data = Absen::select('*')
            ->where('user_id', Auth::user()->id)
            ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('foto', function ($data) {
                    $url= asset('storage/'.$data->foto);
                    return '<img src="'.$url.'" width="70" alt="..." />'; 
                })
                ->rawColumns(['foto'])
                ->make(true);
        }

        return view('guru.riwayatabsen');
    }

    public function create()
    {
       return view('guru.absendatangCreate');
    }
   

    public function save(Request $request)
    {
        $date = Carbon::now();
        $user = User::where('id', Auth::user()->id)->first();
        $datang = Absen::where('user_id', $user->id)->first();

        $file = $request->file('foto')->store('absen', 'public');

        $datang = new Absen;
        $datang->user_id    = $user->id;
        $datang->tanggal    = $date;
        $datang->status     = $request->status;
        $datang->kondisi    = $request->kondisi;
        $datang->foto       = $file;
        $datang->save();
        alert()->success('Absen Berhasil Disimpan');
        return redirect('absen-guru');
    }

   public function edit($id)
   {

       $datang = Absen::find($id);
       return view('guru.absendatangEdit',compact('datang'));
   }

    public function update(Request $request, $id)
    {
        date_default_timezone_set('Asia/Jakarta');

        $datang = Absen::find($id);

        $date = Carbon::now();
        $datang->tanggal      = $date;
        $datang->status       = $request->status;
        $datang->kondisi      = $request->kondisi;

        $datang->updated_at   = date('Y-m-d H:i:s');

        if($datang->foto && file_exists(storage_path('app/public/' . $datang->foto))){
            \Storage::delete('public/'.$datang->foto);
        }
        $file = $request->file('foto')->store('absen', 'public');
        $datang->foto         = $file;
        $datang->save();
        
        alert()->success('Absen Telah Diupdate', 'Success');
        return redirect('absen-guru');

    }

    public function destroy($id)
    {
        $data = Absen::find($id);
        $data->delete();
        return redirect('absen-guru');
    }
}