@extends('layouts.app')

@section('content')
    @include('admin.users._nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                          <a class="btn btn-success" href="{{route('admin.users.create')}}">Create</a>
                        </li>
                    </ul>
                    </nav>
                </div>
                <div class="col-12">
              @include('admin.users.forms.search')

                </div>

                <div class="card-body">
                    <table class="table table-boarded table-stripped" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">email</th>
                                <th scope="col" width="40%">name</th>
                                <th scope="col">role</th>
                                <th scope="col">status</th>

                            </tr>
                        </thead>
                        <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->email}}</td>
                            <td>
                                <a  href="{{'users/'.$user->id}}" >{{$user->name}}</a>
                            </td>
                            <td>
                                @if($user->isAdmin())
                                <span class="badge badge-danger">admin</span>
                                @endif
                                @if($user->isUser())
                                <span class="badge badge-secondary">user</span>
                                @endif
                                @if($user->isModerator())
                                <span class="badge badge-success">moderator</span>
                                @endif
                            </td>
                            <td>
                                @if($user->isWait())
                                    <span class="badge badge-secondary">Waiting</span>
                                @endif
                                @if($user->isActive())
                                    <span class="badge badge-primary">Active</span>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $users->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
