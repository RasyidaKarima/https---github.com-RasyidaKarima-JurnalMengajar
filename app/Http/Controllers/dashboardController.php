<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Jurnal;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Absen;
use App\Models\RPP;
use App\Models\signature;


class dashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jurnal = Jurnal::count();
        $user= User::count();
        $absen= Absen::count();
        $rpp= RPP::count();
        $signature= Signature::count();

        $active = 'dashboard';
        return view('dashboard.index', compact('jurnal', 'user', 'absen', 'rpp', 'signature', 'active'));
    }
}
