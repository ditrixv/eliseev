@extends('layouts.app')
@section('content')
@include('admin.adverts.categories._nav')

     
<div class="card-header d-flex flex-row">
    <a  class="btn btn-success mr-1" href="{{$category->id.'/edit'}}" >Edit</a>
    <form method="post" action="{{ route('admin.adverts.categories.update', $category->id) }}" class="mr-1">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Delete</button>
    </form>
    

</div>


<div class="row" for="rname">
    <div class="col-4"><label id="rname">name:</label></div>
    <div class="col-8"><strong>{{$category->name}}</strong></div>
</div>

<div class="row" for="rslug">
    <div class="col-4"><label id="rslug">slug:</label></div>
    <div class="col-8"><strong>{{$category->slug}}</strong></div>

</div>
<p>
    <a class="btn btn-success" href="{{route('admin.adverts.categories.attributes.create',$category)}}">Add atribute</a>
</p>

<table class="table table-bordered table-stripped" width="100%">
    <thead>
        <tr>
            <th scope="col">Sort</th>
            <th scope="col">name</th>
            <th scope="col" >Slug</th>
            <th scope="col" >Required</th>
        </tr>
    </thead>
    <tbody>
@foreach ($attributes as $atribute)
    <tr>
        <th scope="row">{{$atribute->sort}}</th>                                
        <td>
            <a href="{{route('admin.adverts.categories.attributes.show',[$category,$atribute])}}">{{$atribute->name}}</a>
            
        </td>
        <td>{{$atribute->type}}</td>
        <td>{{$atribute->required ? 'Yes':''}}</td>
    </tr>
@endforeach
 
    </tbody>
</table>

@endsection