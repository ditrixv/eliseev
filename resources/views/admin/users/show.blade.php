@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">show</div>

                <div class="card-body">
                        <div class="row">
                            <div class="col-4"><label for="uemail">email:</label></div>
                            <div class="col-8"><strong id="uemail">{{$user->email}}</strong></div>
                        </div>
                        <div class="row" for="uname">
                            <div class="col-4"><label id="uname">name:</label></div>
                            <div class="col-8"><strong>{{$user->name}}</strong></div>
                        </div>
                        <div class="row">
                            <div class="col-4"><label for="ustatus">status:</label></div>
                            <div class="col-8"><strong id="ustatus">{{$user->status}}</strong></div>
                        </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-info" href="{{ route('admin.users.index') }}">Ok</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
