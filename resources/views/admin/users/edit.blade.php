
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form  method="post" action={{route('admin.users.update', $user->id)}}>
                    @csrf
                    @method('PUT')
                    <div class="card-header">edit user</div>


                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputEmail">email:</label>
                                <input type="email"
                                        class="form-control"
                                        id="inputEmail"
                                        value="{{$user->email}}"
                                        name="email"
                                >
                            </div>

                            <div class="form-group">
                                <label for="inputName">name</label>
                                <input type="text"
                                    class="form-control"
                                    id="inputName"
                                    name="name"
                                    value="{{$user->name}}"
                                >
                            </div>
                        </div>
                    <div class="card-footer" >
                        <button type="submit" class="btn btn-success">Save</button>
                        <a  class="btn btn-primary" href="{{route('admin.users.index')}}" >Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
