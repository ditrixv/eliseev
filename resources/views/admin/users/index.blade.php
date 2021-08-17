@extends('layouts.app')

@section('content')
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

                <div class="card-body">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td width="30%">email</td>
                                <td width="40%">name</td>
                                <td width="10%">status</td>
                                <td width="20%"></td>
                            </tr>
                        </thead>
                    @foreach ($users as $user)
                        <tr>
                            <td width="30%">{{$user->email}}</td>
                            <td width="40%">
                                <a href="{{'users/'.$user->id}}">
                                {{$user->name}}
                                </a>
                            </td>
                            <td width="10%">{{$user->status}}</td>
                            <td width="20%">
                                <nav>
                                <div  class="btn-group" role="group">
                                    <a  class="btn btn-primary" href="{{'users/'.$user->id.'/edit'}}" >Edit</a>
                                </div>
                                <div  class="btn-group" role="group">
                                    <form method="post" action="{{ route('admin.users.destroy', $user->id) }}" class="mr-1">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>

                                </div>
                                </nav>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                </div>
                <div class="card-footer">
                    {{ $users->links() }}
                    <a class="btn btn-info" href="{{route('admin.home')}}">Ok</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
