<?php

namespace App\Http\Controllers;

use App\Exports\AbsenExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Absen;
use Carbon\Carbon;

class absenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absen = Absen::all();
        $active = 'absen';
        return view('absen.absen', compact('absen', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'absen';
        return view('absen.absenCreate', compact('active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = Carbon::now();

        date_default_timezone_set('Asia/Jakarta');
        $file = $request->file('lampiran');
        DB::table('absen')->insert([
            'user_id' => $request->id_users,
            'jam_masuk' => $date,
            'tanggal_absen' =>  $date,
            'status' => $request->status,
            'lampiran' => $file->move('images')
        ]);
        return redirect('absen');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $active = 'absen';
        $absen = Absen::find($id);
        return view('absen.absenEdit', compact('absen','active'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $id = $request->id;
        $file = $request->file('lampiran');
        if ($file != '') {
            // JIKA GAMBAR DIUBAH
            DB::table('absen')->where('id', $id)->update([
                'user_id' => $request->id_users,
                'jam_masuk' => date('Y-m-d H:i:s'),
                'tanggal_absen' =>  date('Y-m-d H:i:s'),
                'status' => $request->status,
                'lampiran' => $file->move('images'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        } else {
            // JIKA TIDAK MENGUBAH GAMBAR
            DB::table('absen')->where('id', $id)->update([
                'user_id' => $request->id_users,
                'jam_masuk' => date('Y-m-d H:i:s'),
                'tanggal_absen' =>  date('Y-m-d H:i:s'),
                'status' => $request->status,
                'lampiran' => $request->lampiran_old,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        return redirect('absen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $absen = Absen::find($id);
        $absen->delete();
        return redirect('/absen');
    }
    public function rekapan()
    {
        // // Untuk menampilkan index
        // $absen = DB::select('SELECT id_users,jam_masuk,tanggal_absen,status
        // FROM absen;');
        // // echo "<pre>"; print_r($disposisi); die;
        // // dd($disposisi); die;
        // return view('absen.rekapan',['dataAbsen' => $absen]);
        $active = 'rekap_absensi';
        return view('absen.rekapan', compact('active'));
    }
    public function exportExcel()
    {
        $absens = Absen::all();
        $active = 'absen';
        $arr_absens = [];
        $id = 1;
        foreach ($absens as  $absen) {
            # code...
            $arr_absen = [
                'id' => $id,
                'nama' => $absen->id_users,
                'jam_masuk' => $absen->jam_masuk,
                'jam_pulang' => '-',
                'tanggal_absen' => $absen->tanggal_absen,
                'status' => $absen->status,
                'lampiran' => $absen->lampiran
            ];
            array_push($arr_absens, $arr_absen);
        }
        dd($arr_absens);
        // return view('absen.absen', ['dataAbsen' => $absen, 'active' => $active]);
    }


    public function rekapanPertanggal($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : " . $tglawal, "Tanggal Akhir : " . $tglakhir]);
        $absens = Absen::whereDate('tanggal_absen', '>=', $tglawal)->whereDate('tanggal_absen', '<=', $tglakhir)->get();
        // dd($absens);
        $active = 'absen';
        $arr_absens = [];
        $id = 1;
        foreach ($absens as  $absen) {
            # code...
            $arr_absen = [
                'id' => $id,
                'nama' => $absen->id_users,
                'jam_masuk' => $absen->jam_masuk,
                'jam_pulang' => '-',
                'tanggal_absen' => $absen->tanggal_absen,
                'status' => $absen->status,
                // 'lampiran' => $absen->lampiran
            ];
            array_push($arr_absens, $arr_absen);
        }
        // dd($arr_absens);
        $today = Carbon::now()->isoFormat('D MMMM Y');
        return (new AbsenExport($arr_absens))->download('02.LAPORAN KEBERADAAN DIKTENDIK UPT SD. BUTUN 02 KEC. GANDUSARI , ' . $today . ".xlsx", \Maatwebsite\Excel\Excel::XLSX);
    }
}
