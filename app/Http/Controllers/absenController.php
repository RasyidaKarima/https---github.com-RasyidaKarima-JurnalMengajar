<?php

namespace App\Http\Controllers;

use App\Exports\AbsenExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Absen;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\Reader\HTML;


class absenController extends Controller
{
    public function index()
    {
        $absen = DB::table('absen')
                    ->join('users','users.id', '=', 'absen.user_id')
                    ->get();

        $active = 'absen';
        return view('absen.absen', compact('absen', 'active'));
    }

    public function create()
    {
        $active = 'absen';
        return view('absen.absenCreate', compact('active'));
    }

    public function edit($id)
    {
        $active = 'absen';
        $absen = Absen::find($id);
        return view('absen.absenEdit', compact('absen','active'));
    }

    public function destroy($id)
    {
        $absen = Absen::find($id);
        $absen->delete();
        return redirect('/absen');
    }
    public function rekapan()
    {
        $active = 'rekap_absensi';
        return view('absen.rekapan', compact('active'));
    }
    public function exportExcel()
    {
        $absens = Absen::select(['absen.*'])->with(['users']);
        $active = 'absen';
        $arr_absens = [];
        $id = 1;
        foreach ($absens as  $absen) {
            $arr_absen = [
                'id' => $id,
                'nama' => $absen->users->name,
                'jabatan' => $absen->users->jabatan,
                'status' => $absen->status,
                'kondisi' => $absen->kondisi,
                'foto' => $absen->foto
            ];
            array_push($arr_absens, $arr_absen);
        }
        dd($arr_absens);
        // return view('absen.absen', ['dataAbsen' => $absen, 'active' => $active]);
    }

    public function rekapanPertanggal($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : " . $tglawal, "Tanggal Akhir : " . $tglakhir]);
        $absens = DB::table('absen')
                    ->join('users','users.id', '=', 'absen.user_id')
                    ->whereDate('tanggal', '>=', $tglawal)
                    ->whereDate('tanggal', '<=', $tglakhir)
                    ->get();
        // dd($absens);
        $active = 'absen';
        $arr_absens = [];
        $id = 1;
        foreach ($absens as  $absen) {
            $arr_absen = [
                'id' => $id++,
                'nama' => $absen->name,
                'jabatan' => $absen->jabatan,
                'status' => $absen->status,
                'kondisi' => $absen->kondisi,
                'foto' => $absen->foto
            ];
            array_push($arr_absens, $arr_absen);
        }
        $ttdKepsek = DB::table('signature')
                ->join('users', 'users.id', '=', 'signature.user_id')
                ->where('users.role', '=', 'kepsek')
                ->where('signature.tanggal', Date("Y-m-d"))
                ->first(['signature.*', 'users.name', 'users.nip']);

        // dd($arr_absens);
        $today = Carbon::now()->isoFormat('DD-M-Y');
        return (new AbsenExport($arr_absens, $ttdKepsek))->download('02.LAPORAN KEBERADAAN DIKTENDIK UPT SD. BUTUN 02 KEC. GANDUSARI , ' . $today . ".xlsx", \Maatwebsite\Excel\Excel::XLSX);
    }
}
