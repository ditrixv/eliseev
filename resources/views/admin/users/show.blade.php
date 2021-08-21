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
                                @if($user->isWait())
                                <span class="badge badge-secondary">Waiting</span>
                            @endif
                            @if($user->isActive())
                            <span class="badge badge-primary">Active</span>
                            @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4"><label for="ustatus">role:</label></div>
                            <div class="col-8">
                            @if($user->isAdmin())
                                <span class="badge badge-danger">admin</span>
                            @endif
                            @if($user->isUser())
                            <span class="badge badge-secondary">user</span>
                            @endif
                            </div>
                        </div>
                </div>
                <div class="card-footer d-flex flex-row">
                    <a  class="btn btn-success mr-1" href="{{$user->id.'/edit'}}" >Edit</a>
                    <form method="post" action="{{ route('admin.users.verify', $user->id) }}" class="mr-1">
                        @csrf
                        {{-- @method('UPDATE') --}}
                        @if($user->isWait())
                        <button class="btn btn-warning">Verify</button>
                        @endif
                    </form>
                    @can('admin-panel')
                    <form method="post" action="{{ route('admin.users.update', $user->id) }}" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    @endcan
                    <a  class="btn btn-primary mr-1" href="{{route('admin.users.index')}}" >Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
