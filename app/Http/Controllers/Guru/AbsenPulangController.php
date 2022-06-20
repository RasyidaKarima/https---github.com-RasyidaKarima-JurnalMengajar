<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\AbsenPulang;
use Auth;
use Alert;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;

class AbsenPulangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(Request $request)
   {
    if ($request->ajax()) {
        $data = AbsenPulang::select('*')
            ->where('user_id', Auth::user()->id)
            ->where('tanggal', Date("Y-m-d"))
            ->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('foto', function ($data) {
                $url= asset('images/absenpulang/'.$data->foto);
                return '<img src="'.$url.'" width="70" alt="..." />'; 
            })
            ->addColumn('action', function ($data) {
                $button = ' <a href="'. route("absen-pulangEdit.guru", $data->id).'" class="edit btn btn-success " id="' . $data->id . '" ><i class="fa fa-edit"></i></a>';
                $button .= ' <a href="'. route("absen-pulang.Destroy", $data->id).'" class="hapus btn btn-danger" id="' . $data->id . '" ><i class="fa fa-trash"></i></a>';
                return $button;
            })
            ->rawColumns(['foto', 'action'])
            ->make(true);
    }
    return view('guru.absenpulang');
   }

   public function create()
   {
       return view('guru.absenpulangCreate');
   }

   public function save(Request $request)
    {
        $date = Carbon::now();
        $user = User::where('id', Auth::user()->id)->first();
        $pulang = AbsenPulang::where('user_id', $user->id)->first();

        $pulang = new AbsenPulang;
        $pulang->user_id = $user->id;
        $pulang->tanggal = $date;
        $pulang->status = $request->status;
        $pulang->kondisi = $request->kondisi;
        $file = $request->file('foto');
        //Mendapatkan nama file
        $nama_file = $file->getClientOriginalName();

        // Mendapatkan Extension File
        $extension = $file->getClientOriginalExtension();
    
        // Mendapatkan Ukuran File
        $ukuran_file = $file->getSize();
     
        // Proses Upload File
        $destinationPath = 'images\absenpulang';
        $file->move($destinationPath,$file->getClientOriginalName());
        $pulang->foto = $nama_file;
        $pulang->save();
        alert()->success('Absen Pulang Berhasil Disimpan');
        return redirect('absen-pulang-guru');
    }

   public function edit($id)
   {
       $pulang = AbsenPulang::find($id);
       return view('guru.absenpulangEdit',compact('pulang'));
   }

   public function update(Request $request, $id)
   {
       date_default_timezone_set('Asia/Jakarta');
       $file = $request->file('foto');
       if($request->file('foto') != null){
           // dd($file);
           $ext_foto = $file->extension();
           $filename = $file->move(public_path() . '/images/absenpulang/', $file->getClientOriginalName());
           $date = Carbon::now();
           $pulang = AbsenPulang::where('id', $id)->first();
           // dd($absen_datang);
           $pulang->tanggal      = $date;
           $pulang->status       = $request->status;
           $pulang->kondisi      = $request->kondisi;
           $pulang->foto         = $file->getClientOriginalName();
           $pulang->updated_at   = date('Y-m-d H:i:s');
           $pulang->save();
       }else{
            $date = Carbon::now();
           DB::table('absen_pulang')->where('id',$id)->update([
               'tanggal' => $date,
               'status' => $request->status,
               'kondisi' => $request->kondisi,
               'foto' => $request->foto_old,
               'updated_at' => date('Y-m-d H:i:s')
           ]);
       }
       alert()->success('Absen Pulang Telah Diupdate', 'Success');
       return redirect('absen-pulang-guru');

   }

    public function destroy($id)
    {
        $data = AbsenPulang::find($id);
        $data->delete();
        return redirect('absen-pulang-guru');
    }
}