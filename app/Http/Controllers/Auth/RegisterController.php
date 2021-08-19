<?php

namespace App\Http\Controllers\Auth;

use App\Entity\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\UseCases\Auth\RegisterService;



class RegisterController extends Controller
{
   // use RegistersUsers;

    protected $redirectTo = '/login';


    protected $service;

    public function __construct(RegisterService $service)
    {
        $this->service = new RegisterService();
        $this->middleware('guest');
    }

    public function verify($token){

        if(!$user = User::where('verify_token',$token)->first()){
            return redirect()->route('login')
                ->with('error','Sorry your link cannot be identified');
        }

        try{
            $this->service->verify($user->id);
            return redirect()->route('login')
                ->with('success','your email is veriffied. You can login');

        } catch(\DomainException $e ){
            return redirect()->route('login')->with('error',$e->getMessage());
        }


    }

    protected function register(RegisterRequest $request)
    {
        $this->service->register($request);
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
