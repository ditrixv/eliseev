@extends('layouts.app')

@section('content')
    @include('admin.regions._nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                          <a class="btn btn-success" href="{{route('admin.regions.create')}}">Add Region</a>
                        </li>
                    </ul>
                    </nav>
                </div>
                <div class="col-12">
                    {{-- @include('admin.users.forms.search') --}}
                </div>

                <div class="card-body">
                    <table class="table table-stripped" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col" >slug</th>
                                <th scope="col">parent</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach ($regions as $region)
                        <tr>
                            <th scope="row">{{$region->id}}</th>
                            <td>
                                <a href="{{route('admin.regions.show',$region)}}">{{$region->name}}</a>
                            </td>
                            <td>{{$region->slug}}</td>
                            <td>{{$region->parent ? $region->parent->name:''}}</td>
                        </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
