
@extends('layouts.app')

@section('content')
@include('admin.users._nav')
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
                                <label for="uemail">email:</label>
                                <input type="email"
                                        class="form-control {{$errors->has('email')?' is-invalid': ''}}"
                                        id="uemail"
                                        value="{{old('email',$user->email)}}"
                                        name="email"
                                        required                                >
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback"><strong>{{$errors->first('email')}}</strong></span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="uname">name</label>
                                <input type="text"
                                    class="form-control {{$errors->has('name')?' is-invalid': ''}}"
                                    id="uname"
                                    name="name"
                                    value="{{old('name',$user->name)}}"
                                    required
                                >
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback"><strong>{{$errors->first('name')}}</strong></span>
                                @endif
                            </div>
                            {{-- <div class="form-group">
                                <label for="ustatus">status</label>
                                <select name="status" class="form-control" id="ustatus">
                                    @foreach ( $statuses as $value => $label )
                                        <option
                                            value="{{$value}}"
                                            {{$value === old('status',$user->status)?' selected':''}}
                                        >
                                            {{$label}}
                                        </option>

                                    @endforeach
                                </select>
                            </div> --}}
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
