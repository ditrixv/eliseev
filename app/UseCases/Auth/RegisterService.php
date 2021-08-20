<?php

namespace App\UseCases\Auth;

use App\Entity\User;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests\Auth\RegisterRequest;

class RegisterService {


    public function register(RegisterRequest $request ):void
    {
       $user = User::register($request['name'],$request['email'],$request['password']);
       Mail::to($user->email)->send(new VerifyMail($user));

    }

    public function verify($id):void
    {
        $user = User::findOrFail($id);
        $user->verify();
    }
}
