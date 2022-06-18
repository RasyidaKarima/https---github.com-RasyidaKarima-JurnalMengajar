<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\AbsenDatang;
use Auth;
use Alert;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;


class AbsenDatangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = AbsenDatang::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('foto', function ($data) {
                    $url= asset('images/absendatang/'.$data->foto);
                    return '<img src="'.$url.'" width="70" alt="..." />'; 
                })
                ->addColumn('action', function ($data) {
                    return '<button type="button" class="btn btn-success btn-sm" id="getEditArticleData" data-id="' . $data->id . '"><i class="fa fa-edit"></i></button>
                    <button type="button" data-id="' . $data->id . '" data-toggle="modal" data-target="#DeleteArticleModal" class="btn btn-danger btn-sm" id="getDeleteId"><i class="fa fa-trash"></i></button>';
                })
                ->rawColumns(['foto', 'action'])
                ->make(true);
        }
        return view('guru.absendatang');
    }


    public function create()
    {
       return view('guru.absendatangCreate');
    }
   

    public function save(Request $request)
    {
        $date = Carbon::now();
        $user = User::where('id', Auth::user()->id)->first();
        $datang = AbsenDatang::where('user_id', $user->id)->first();

        $datang = new AbsenDatang;
        $datang->user_id = $user->id;
        $datang->tanggal = $date;
        $datang->status = $request->status;
        $datang->kondisi = $request->kondisi;
        $file = $request->file('foto');
        //Mendapatkan nama file
        $nama_file = $file->getClientOriginalName();

        // Mendapatkan Extension File
        $extension = $file->getClientOriginalExtension();
    
        // Mendapatkan Ukuran File
        $ukuran_file = $file->getSize();
     
        // Proses Upload File
        $destinationPath = 'images\absendatang';
        $file->move($destinationPath,$file->getClientOriginalName());
        $datang->foto = $nama_file;
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