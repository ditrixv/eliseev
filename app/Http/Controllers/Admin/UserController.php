<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {
        //
        return view('admin.users.index');
    }


    public function create()
    {
        //
        return view('admin.users.create');

    }


    public function store(Request $request)
    {
        //

    }


    public function show($id)
    {
        //
        return view('admin.users.show ');
    }


    public function edit($id)
    {
        //
        return view('admin.users.edit');
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
