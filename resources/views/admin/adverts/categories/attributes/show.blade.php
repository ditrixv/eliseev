@extends('layouts.app')

@section('content')
@include('admin.adverts.categories._nav')

<div class="card-header d-flex flex-row">
    <a  class="btn btn-success mr-1" href="{{route('admin.adverts.categories.attributes.edit',[$category->id,$attribute->id])}}" >Edit</a>
    <form method="post" action="{{ route('admin.adverts.categories.attributes.destroy', [$category->id, $attribute->id]) }}" class="mr-1">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Delete</button>
    </form>
   

</div>
<table class="table table-bordered table-striped">
    <tbody>
    <tr>
        <th>ID</th><td>{{ $attribute->id }}</td>
    </tr>
    <tr>
        <th>Name</th><td>{{ $attribute->name }}</td>
    </tr>
    <tr>
        <th>Type</th><td>{{ $attribute->type }}</td>
    </tr>  
    <tr>
        <th>Variants</th><td>
            @foreach ($attribute->variants as $variant )
                {{$variant}}<br/>
            @endforeach
            {{-- {{implode("\n", $attribute->variants)}} --}}
        </td>
    </tr>    
    <tr>
        <th>Required</th><td>{{ $attribute->required }}</td>
    </tr>    

    <tr>
        <th>Sort</th><td>{{ $attribute->sort }}</td>
    </tr>  
    <tbody>
    </tbody>
</table>
@endsection