<?php

namespace App\Http\Controllers;

use App\Exports\ExportJurnalWord;
use App\Exports\JurnalExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tandatanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ttd = DB::table('signature')
                    ->join('users','users.id', '=', 'signature.user_id')
                    ->get();

        $active = 'tanda_tangan';

        return view('ttd', compact('ttd', 'active'));
    }
}
