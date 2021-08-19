<?php

namespace App\Http\Controllers\Auth;

use App\Entity\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
   // use RegistersUsers;

    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function verify($token){

        if(!$user = User::where('verify_token',$token)->first()){
            return redirect()->route('login')
                ->with('error','Sorry your link cannot be identified');
        }

        try{
            $user->verify();
            return redirect()->route('login')
                ->with('success','your email is veriffied. You can login');

        } catch(\DomainException $e ){
            return redirect()->route('login')->with('error',$e->getMessage());
        }


    }

    protected function register(RegisterRequest $request)
    {
        $user = User::register($request['name'],$request['email'],$request['password']);

        Mail::to($user->email)->send(new VerifyMail($user));
        //Mail::to($user->email)->queue(new VerifyMail($user)); вариант отправки через постиановку в очередь
        //return $this->registered();
        return redirect()->route('login')->with('success','check you email and verify');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function registered()
    {

        Auth::logout();
        return redirect()->route('login')->with('success','check you email and verify');
    }


}
