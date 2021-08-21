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
                <form action="?" method="get">
                    <div class="row">
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label for="filter-uid" class="col-form-label">id</label>
                                <input id="filter-uid" class="form-control" name="id" value="{{request('id')}}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="filter-email" class="col-form-label">email</label>
                                <input id="filter-email" class="form-control" name="email" value="{{request('email')}}">
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="filter-uname" class="col-form-label">name</label>
                                <input id="filter-uname" class="form-control" name="name" value="{{request('name')}}">
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <label for="filter-ustatus" class="col-form-label">status</label>
                            <select id="filter-ustatus" class="form-control" name="status" value="{{request('status')}}">
                                <option></option>
                                @foreach ($statuses as $value => $label )
                                    <option value="{{$value}}" {{($value === request('status'))? 'selected' : '' }}>{{$label}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="filter-urole" class="col-form-label">role</label>
                            <select id="filter-urole" class="form-control" name="role" value="{{request('role')}}">
                                <option></option>
                                @foreach ($roles as $value => $label )
                                    <option value="{{$value}}" {{($value === request('role'))? 'selected' : '' }}>{{$label}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label class="col-form-label">&nbsp;</label><br />
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>

                <div class="card-body">
                    <table class="table table-stripped" width="100%">
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
                                @if ($user->isAdmin())
                                    <span class="badge badge-danger">admin</span>
                                @else
                                <span class="badge badge-secondary">user</span>
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
