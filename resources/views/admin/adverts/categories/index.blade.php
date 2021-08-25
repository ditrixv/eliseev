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
            </tr>
        @endforeach
        <tbody></tbody>
    </table>
@endsection
