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
        $data = AbsenPulang::get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('foto', function ($data) {
                $url= asset('images/absenpulang/'.$data->foto);
                return '<img src="'.$url.'" width="70" alt="..." />'; 
            })
            ->addColumn('action', function ($data) {
                $button = ' <a href="'. route("absen-pulangEdit.guru", $data->id).'" class="edit btn btn-success " id="' . $data->id . '" ><i class="fa fa-edit"></i></a>';
                $button .= ' <button class="hapus btn btn-danger" id="' . $data->id . '" ><i class="fa fa-trash"></i></button>';
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

    public function update(Request $request, AbsenPulang $absenpulang)
    {

        $this->validate($request, [
            'status'     => 'required',
            'kondisi'   => 'required'
        ]);

        $absenpulang = AbsenPulang::findOrFail($absenpulang->id);

        if($request->file('foto') == "") {

            $date = Carbon::now();

            $absenpulang->update([
                'tanggal'     => $date,
                'status'   => $request->status,
                'kondisi'   => $request->kondisi
            ]);
    
        } else {
            $date = Carbon::now();

            //hapus foto lama
            Storage::disk('local')->delete('public/images/absenpulang/'.$absenpulang->foto);

            //upload foto baru
            $foto = $request->file('foto');
            $foto->storeAs('public/images/absenpulang', $foto->hasName());

            $absenpulang->update([
                'foto'  => $foto->hashName(),
                'tanggal'     => $date,
                'status'   => $request->status,
                'kondisi'   => $request->kondisi
            ]);

            alert()->success('Absen Pulang Telah Diupdate', 'Success');
            return redirect('absen-pulang-guru');
        }

    }

    public function destroy($id)
    {
        
        $data = AbsenPulang::find($id);
        $data->delete();
        return redirect('absen-pulang-guru');
    }
}