<?php

namespace App\Http\Controllers;

use App\Exports\ExportJurnalWord;
use App\Exports\JurnalExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class rppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rencana = DB::table('rpp')
                    ->join('users','users.id', '=', 'rpp.user_id')
                    ->get();

        $active = 'rpp';

        return view('rpp', compact('rencana', 'active'));
    }
}
