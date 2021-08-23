@extends('layouts.app')

@section('content')
@include('admin.regions._nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex flex-row">
                    <a  class="btn btn-success mr-1" href="{{$region->id.'/edit'}}" >Edit</a>
                    <form method="post" action="{{ route('admin.regions.update', $region->id) }}" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    <a  class="btn btn-primary mr-1" href="{{route('admin.regions.index')}}" >Cancel</a>

                </div>

                <div class="card-body">

                        <div class="row" for="rname">
                            <div class="col-4"><label id="rname">name:</label></div>
                            <div class="col-8"><strong>{{$region->name}}</strong></div>
                        </div>

                        <div class="row" for="rslug">
                            <div class="col-4"><label id="rslug">slug:</label></div>
                            <div class="col-8"><strong>{{$region->slug}}</strong></div>

                        </div>
                        @if($parent !== null)
                        <div class="row" for="rslug">
                            <div class="col-4"><label id="rslug">parent:</label></div>
                            <div class="col-8"><strong>{{$parent->name}}</strong></div>

                        </div>
                        @endif

                        <div class="form-group">
                        <a  class="btn btn-primary mr-1" href="{{route('admin.regions.create',['parent_id' => $region->id])}}" >Create</a>
                        </div>

                    <table class="table table-stripped" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col" >slag</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach ($regions as $child)
                        <tr>
                            <th scope="row">{{$child->id}}</th>
                            <td>
                                <a href="{{route('admin.regions.show',$child)}}">{{$child->name}}</a>
                            </td>
                            <td>{{$child->slug}}</td>
                        </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex flex-row">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
