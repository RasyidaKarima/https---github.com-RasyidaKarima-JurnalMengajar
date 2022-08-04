<?php

namespace App\Http\Controllers;

use App\Exports\ExportJurnalWord;
use App\Exports\JurnalExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jurnal;
use Maatwebsite\Excel\Files\LocalTemporaryFile;

class jurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurnal = DB::table('jurnal')
                    ->join('rpp','rpp.id', '=', 'jurnal.rpp_id')
                    ->join('users', 'users.id', '=', 'jurnal.user_id')
                    ->where('jurnal.status', '=', 'sudah divalidasi')
                    ->get();
        $active = 'jurnal';

        return view('jurnal.jurnal', compact('jurnal', 'active'));
    }

    public function show(Request $request,$id)
    {
        $jurn = Jurnal::find($id);
        return view('jurnal.jurnal',compact('jurn'))->renderSections()['content'];
    }

    public function cetak()
    {
        $active = 'cetak_jurnal';
        return view('jurnal.cetakJurnal', compact('active'));
    }

    public function exportWord(){
        $jurnal = DB::table('jurnal')
                ->join('rpp','rpp.id', '=', 'jurnal.rpp_id')
                ->join('users', 'users.id', '=', 'jurnal.user_id')
                ->where('jurnal.status', '=', 'sudah divalidasi')
                ->where('tanggal', Date("Y-m-d"))
                ->get();
        $ttdKepsek = DB::table('signature')
                ->join('users', 'users.id', '=', 'signature.user_id')
                ->where('users.role', '=', 'kepsek')
                ->latest('signature.tanggal')
                ->first(['signature.*', 'users.name', 'users.nip']);

        $file = (new ExportJurnalWord())->exportWord($jurnal, $ttdKepsek);
        return response()->download($file)->deleteFileAfterSend();

        //return view('jurnal.exportWord', compact('jurnal', 'ttdKepsek'));

    }


    public function cetakPertanggal($tglawal, $tglakhir)
    {
        $jurnal = DB::table('jurnal')
                ->join('rpp','rpp.id', '=', 'jurnal.rpp_id')
                ->join('users', 'users.id', '=', 'jurnal.user_id')
                ->where('jurnal.status', '=', 'sudah divalidasi')
                ->whereDate('tanggal', '>=', $tglawal)
                ->whereDate('tanggal', '<=', $tglakhir)
                ->get();
        
        $ttdKepsek = DB::table('jurnal')
                ->join('users', 'users.id', '=', 'jurnal.user_id')
                ->where('users.role', '=', 'kepsek')
                ->where('jurnal.tanggal', Date("Y-m-d"))
                ->first(['jurnal.tanda_tangan', 'users.name', 'users.nip']);

        $file = (new ExportJurnalWord())->exportWord($jurnal, $ttdKepsek);
        return response()->download($file)->deleteFileAfterSend();

        //return view('jurnal.exportWord', compact('jurnal', 'ttdKepsek'));
    }
}
