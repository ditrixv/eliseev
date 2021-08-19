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

                <div class="card-body">
                    <table class="table table-stripped" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">email</th>
                                <th scope="col" width="40%">name</th>
                                <th scope="col">status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->email}}</th>
                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                    @if($user->isWait())
                                        <span class="badge badge-secondary">Waiting</span>
                                    @endif
                                    @if($user->isActive())
                                    <span class="badge badge-primary">Active</span>
                                    @endif

                            </td>
                            <td>
                                <div  class="d-flex flex-row mb-3">
                                    <a  class="btn btn-primary mr-1" href="{{'users/'.$user->id}}" >Show</a>
                                    <a  class="btn btn-success mr-1" href="{{'users/'.$user->id.'/edit'}}" >Edit</a>

                                    <form method="post" action="{{ route('admin.users.update', $user->id) }}" class="mr-1">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>

                                </div>

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
