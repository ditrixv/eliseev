@extends('layouts.app')

@section('content')
@include('admin.users._nav')
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
                            <div class="col-8">
                                @if($user->status === App\Entity\User::STATUS_WAIT)
                                <span class="badge badge-secondary">Waiting</span>
                            @endif
                            @if($user->status === App\Entity\User::STATUS_ACTIVE)
                            <span class="badge badge-primary">Active</span>
                            @endif
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <a  class="btn btn-success" href="{{$user->id.'/edit'}}" >Edit</a>
                    <a  class="btn btn-primary" href="{{route('admin.users.index')}}" >Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
