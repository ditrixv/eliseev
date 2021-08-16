<?php

namespace App\Http\Controllers\Auth;
use App\Entity\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Foundation\Auth\ThrottlesLogins;
class LoginController extends Controller
{
    /*  TODO: check TooManyLogin
    //use ThrottlesLogins;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/cabinet';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }


    public function login(LoginRequest $request)
    {


        /*  TODO: check TooManyLogin

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        */


        $authenticated = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ],
        $request->filled('remember'));

       // $authenticated = true;

        if($authenticated){

            $user = Auth::user();
            if($user->status !== User::STATUS_ACTIVE){
                Auth::logout();
                return back()->with('error','you need to confirm your account');
            }

            $request->session()->regenerate();
            return redirect()->route('cabinet')->with('success','you succesfully logged');
        }

        return back()->with('error','wrong username password');

    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
