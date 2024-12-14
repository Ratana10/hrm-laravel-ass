<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Auth;
use App\Models\User; 
use Hash;
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
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }


    public function login(Request $r){
        if($r->isMethod('post')) {
            $credentials = User::where('email', $r->email)->first();
            if(Hash::check($r->password, $credentials->password)) {
                if (Auth::attempt(['email' => $r->email, 'password' => $r->password])) {
                    return redirect()->route('home')->with('success', 'Login successfully');
                }
            }

            return redirect()->route('home');
        }

        return view('auth.login');
    }

}
