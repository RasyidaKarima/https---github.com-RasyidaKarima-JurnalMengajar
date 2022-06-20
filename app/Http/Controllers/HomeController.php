<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'guru'){
            return view('guru.home');
        }elseif(Auth::user()->role == 'kepsek'){
            return view('guru.home');
        }elseif(Auth::user()->role == 'admin'){
            return view('dashboard.index');
        }
    }
}
