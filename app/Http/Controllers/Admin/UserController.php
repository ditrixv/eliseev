<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Entity\User;
use App\Http\Requests\Admin\Users\CreateRequest;
use App\Http\Requests\Admin\Users\UpdateRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $query= User::orderByDesc('id');

        if(!empty($value = $request->get('id') ) )
            $query->where('id', $value);

        if(!empty($value = $request->get('email') ) )
            $query->where('email', 'like','%'.$value.'%');



        if(!empty($value = $request->get('name') ) )
            $query->where('name', 'like','%'.$value.'%');


        if(!empty($value = $request->get('status') ) )
            $query->where('status', 'like','%'.$value.'%');

        if(!empty($value = $request->get('role') ) )
            $query->where('role', 'like','%'.$value.'%');



       // $users= User::orderBy('id','desc')->paginate(10);

       $users= $query->paginate(10);

        $statuses = [User::STATUS_ACTIVE => 'active', User::STATUS_WAIT => 'wait'];
        $roles = [User::ROLE_ADMIN => 'admin', User::ROLE_USER => 'user'];
        return view('admin.users.index',compact('users','statuses','roles'));
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(CreateRequest $request)
    {

        $user = User::new($request['name'],$request['email']);

        return redirect()->route('admin.users.show',$user);

    }


    public function show(User $user)
    {
        return view('admin.users.show ',compact('user'));
    }


    public function edit(User $user)
    {
        // $statuses = [  User::STATUS_WAIT => 'Waiting',   User::STATUS_ACTIVE => 'Active', ];

        // return view('admin.users.edit',compact('user','statuses'));
        $roles = [User::ROLE_ADMIN => 'admin', User::ROLE_USER => 'user',];
        return view('admin.users.edit',['user' => $user, 'roles' => $roles]);
    }


    public function update(UpdateRequest $request, User $user)
    {

        $user->update($request->only(['name','email','status','role']));
        return redirect()->route('admin.users.show',$user);

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
