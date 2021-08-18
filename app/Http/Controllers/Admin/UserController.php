<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Entity\User;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
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


    public function store(CreateRequest $request)
    {

        $user = User::create([
            "name"  =>  $request['name'],
            "email"  => $request['email'],
            "status" => User::STATUS_WAIT,
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
        $statuses = [
            User::STATUS_WAIT => 'Waiting',
            User::STATUS_ACTIVE => 'Active',
        ];

        return view('admin.users.edit',compact('user','statuses'));
    }


    public function update(UpdateRequest $request, User $user)
    {

        $user->update($request->only(['name','email','status']));
        return redirect()->route('admin.users.index');

    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
