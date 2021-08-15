<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{


    use AuthenticatesUsers;

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

    public function authenticated(Request $request, $user){
        if($user->status !== User::STATUS_ACTIVE){
            $this->guard()->logout();
            return back()->with('error','you need to confirm your account');
        }
        //return redirect()->intendent($this->redirectTo);

        return redirect($this->redirectTo);
    }

}
