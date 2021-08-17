<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Entity\User;
use Faker\Guesser\Name;

class UserController extends Controller
{

    public function index()
    {
        //
        $users = User::paginate(5);
        return view('admin.users.index',compact('users'));
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
        //
        $data = $this->validate($request,[
                'name' => 'bail|required|string|max:255',
                'email' => 'bail|required|string|email|max:255',
        ]);

        $user = User::create([
            "name"  =>  $request['name'],
            "email"  => $request['email'],
            "status" => User::STATUS_ACTIVE,
        ]);
        //return redirect()->route('admin.users.show',['user' => $user]);
        //return redirect()->route('admin.users.show',compact('user'));
        return redirect()->route('admin.users.show',$user);

    }


    public function show(User $user)
    {
        return view('admin.users.show ',compact('user'));
    }


    public function edit(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }


    public function update(Request $request, User $user)
    {

        $data = $this->validate($request,[
            'name' => 'bail|required|string|max:255',
            'email' => 'bail|required|string|email|max:255',
        ]);

        $user->update($data);
        return redirect()->route('admin.users.index');

    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
