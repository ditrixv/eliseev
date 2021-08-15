<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/cabinet';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function verify($token){

        if(!$user = User::where('verify_token',$token)->first()){
            return redirect()->route('login')
                ->with('error','Sorry your link cannot be identified');
        }

        if($user->status !== User::STATUS_WAIT){
            return redirect()->route('login')
                ->with('error','Sorry your email already veriffied');
        }

        $user->status = User::STATUS_ACTIVE;
        $user->verify_token = null;
        $user->save();

        return redirect()->route('login')
                ->with('success','your email is veriffied. You can login');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }


    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verify_token' => Str::random(),
            'status' => User::STATUS_WAIT,
        ]);

        Mail::fake();
        Mail::to($user->email)->send(new VerifyMail($user));
        //Mail::to($user->email)->queue(new VerifyMail($user)); вариант отправки через постиановку в очередь
        return $user;
    }

    protected function registered(Request $request, $user)
    {

        $this->guard()->logout();
     //   return redirect()->route('login');
    return redirect()->route('login')
                ->with('success','check you email and verify');
    }


}
