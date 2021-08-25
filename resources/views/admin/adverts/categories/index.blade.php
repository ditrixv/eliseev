@extends('layouts.app')
@section('content')
    @include('admin.adverts.categories._nav')
 
    <p><a href="{{route('admin.adverts.categories.create')}}" class="btn btn-success">Add Category</a></p>
    <table class="table table-boarded table-stripped">
        <thead></thead>
        @foreach ($categories as $category)
            <tr>
                <td>
                    @for ($i = 0; $i < $category->depth; $i++)
                        &mdash;
                    @endfor
                    
                    <a href="{{route('admin.adverts.categories.show',$category->id)}}">{{$category->name}}</a>
                    
                </td>   
                <td> {{$category->slug}}</td>
                <td>
                    <div class=" d-flex flex-row">
                        <form method="post" action="{{ route('admin.adverts.categories.first', $category->id) }}" class="mr-1">
                            @csrf
                            <button class="btn btn-sm btn-outline-primary">first</button>
                        </form>    
                        <form method="post" action="{{ route('admin.adverts.categories.up', $category) }}" class="mr-1">
                            @csrf
                            <button class="btn btn-sm btn-outline-primary">up</button>
                        </form>                              
                        <form method="post" action="{{ route('admin.adverts.categories.down', $category) }}" class="mr-1">
                            @csrf
                            <button class="btn btn-sm btn-outline-primary">down</button>
                        </form>                                                      
                        <form method="post" action="{{ route('admin.adverts.categories.last', $category) }}" class="mr-1">
                            @csrf
                            <button class="btn btn-sm btn-outline-primary">last</button>
                        </form>                                                      
                    </div>    
                </td>    
            </tr>
        @endforeach
        <tbody></tbody>
    </table>
@endsection
