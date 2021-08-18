@extends('layouts.app')

@section('content')
@include('admin.users._nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="POST" action={{route('admin.users.store')}}>
                    @csrf
                    <div class="card-header">create user</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="uemail">email:</label>
                                <input type="email"
                                        class="form-control {{$errors->has('email')?' is-invalid': ''}}"
                                        id="uemail"
                                        name="email"
                                        value="{{old('email')??''}}"
                                >
                                @if ($errors->has('email'))
                                <span class="invalid-feedback"><strong>{{$errors->first('email')}}</strong></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="uname">name</label>
                                <input type="text"
                                    class="form-control {{$errors->has('name')?' is-invalid': ''}}"
                                    id="uname"
                                    name="name"
                                    value="{{old('name')??''}}"
                                >
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback"><strong>{{$errors->first('name')}}</strong></span>
                                @endif
                            </div>
                        </div>
                    <div class="card-footer" >
                        <button type="submit" class="btn btn-success mr-1">Create</button>
                        <a  class="btn btn-primary mr-1" href="{{route('admin.users.index')}}" >Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
