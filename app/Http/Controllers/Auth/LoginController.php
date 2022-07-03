<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        // dd($input);
        $this -> validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $remember = $input['remember_me'] == "on" ? true : false;
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password']), $remember))
        {
            if(auth()->user()->role == 'guru')
            {
                return redirect()->route('home.guru');
            } elseif(auth()->user()->role == 'kepsek') {
                return redirect()->route('home.kepsek');
            } elseif(auth()->user()->role == 'admin'){
                return redirect()->route('dashboard');
            }
        } else {
            return redirect()->route('login')->with('error', "email dan password salah");
        }
    }
    public function showLoginForm() {
        return view('auth.login_new');
    }

}
