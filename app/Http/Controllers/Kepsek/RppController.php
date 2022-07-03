<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\RPP;
use Auth;
use Alert;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;


class RppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = RPP::select('*')
            ->where('user_id', Auth::user()->id)
            ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $button = ' <a href="'. route("rppEdit.kepsek", $data->id).'" class="edit btn btn-success " id="' . $data->id . '" ><i class="fa fa-edit"></i></a>';
                    $button .= ' <a href="'. route("rpp-kepsek.Destroy", $data->id).'" class="hapus btn btn-danger" id="' . $data->id . '" ><i class="fa fa-trash"></i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('kepsek.rpp');
    }


    public function create()
    {
       return view('kepsek.rppCreate');
    }
   

    public function save(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $rpp = RPP::where('user_id', $user->id)->first();

        $rpp = new RPP;
        $rpp->user_id = $user->id;
        $rpp->mata_pelajaran = $request->mata_pelajaran;
        $rpp->kompetensi_inti = $request->kompetensi_inti;
        $rpp->penjelasan = $request->penjelasan;
        $rpp->save();
        alert()->success('RPP Berhasil Disimpan');
        return redirect('rpp-kepsek');
    }

   public function edit($id)
   {

       $rpp = RPP::find($id);
       return view('kepsek.rppEdit',compact('rpp'));
   }

    public function update(Request $request, $id)
    {

        $rpp = RPP::findOrFail($id);
        $rpp->mata_pelajaran = $request->mata_pelajaran;
        $rpp->kompetensi_inti = $request->kompetensi_inti;
        $rpp->penjelasan = $request->penjelasan;
        $rpp->update();
        alert()->success('Data RPP Berhasil Diupdate', 'Success');
        return redirect('rpp-kepsek');
    }

    public function destroy($id)
    {
        $data = RPP::find($id);
        $data->delete();
        return redirect('rpp-kepsek');
    }
}