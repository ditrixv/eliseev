
@extends('layouts.app')
@section('content')
@include('cabinet.profile._nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


    <form method="POST" action={{route('cabinet.profile.update') }}>
            @csrf
            @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="rname">Name</label>
                <input type="text"
                    class="form-control {{$errors->has('name')?' is-invalid': ''}}"
                    id="rname"
                    name="name"
                    value="{{old('name',$user->name)}}"
                    required
                >
                @if ($errors->has('name'))
                    <span class="invalid-feedback"><strong>{{$errors->first('name')}}</strong></span>
                @endif
            </div>
            <div class="form-group">
                <label for="rname">Lastname</label>
                <input type="text"
                    class="form-control {{$errors->has('last_name')?' is-invalid': ''}}"
                    id="rname"
                    name="last_name"
                    value="{{old('last_name',$user->last_name)}}"
                    required
                >
                @if ($errors->has('last_name'))
                    <span class="invalid-feedback"><strong>{{$errors->first('last_name')}}</strong></span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success mr-1">Save</button>
            </div>
    </form>
            </div>
        </div>
    </div>
</div>
@endsection
