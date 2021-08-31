<?php

namespace App\Http\Controllers\Cabinet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return view('cabinet.profile.home',compact('user'));

    }



    public function edit()
    {
        //
        $user = Auth::user();
        return view('cabinet.profile.edit',compact('user'));
    }


    public function update(Request $request)
    {


        //dd($request);
        $this->validate($request,[
            'name' => 'required|string',
            'last_name' => 'required|string',

        ]);

        $user = Auth::user();

        $user->update($request->only('name','last_name'));


        return  redirect()->route('cabinet.profile.index',compact('user'));

    }


}
