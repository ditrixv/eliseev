<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Entity\User;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;

class UserController extends Controller
{

    public function index()
    {
       $users = User::orderBy('id','desc')->paginate(5);
        return view('admin.users.index',compact('users'));
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(CreateRequest $request)
    {

        $user = User::new($request['name'],$request['email']);
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
        // $statuses = [
        //     User::STATUS_WAIT => 'Waiting',
        //     User::STATUS_ACTIVE => 'Active',
        // ];

        // return view('admin.users.edit',compact('user','statuses'));
        return view('admin.users.edit',['user' => $user]);
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

    public function verify(User $user){
        try{

            $user->verify();
            return redirect()->route('admin.users.show',$user);

        } catch(\DomainException $e ){
            return redirect()->route('admin.users.show',$user)->with('error',$e->getMessage());
        }
    }
}
