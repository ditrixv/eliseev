
@extends('layouts.app')

@section('content')
@include('admin.adverts.categories._nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form  method="post" action={{route('admin.adverts.categories.update', $category->id)}}>
                    @csrf
                    @method('PUT')
                    <div class="card-header">edit category</div>


                        <div class="card-body">
                            <div class="form-group">

                            <div class="form-group">
                                <label for="cname">name</label>
                                <input type="text"
                                    class="form-control {{$errors->has('name')?' is-invalid': ''}}"
                                    id="cname"
                                    name="name"
                                    value="{{old('name',$category->name)}}"
                                  
                                >
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback"><strong>{{$errors->first('name')}}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="cslug">slug</label>
                                <input type="text"
                                    class="form-control {{$errors->has('slug')?' is-invalid': ''}}"
                                    id="cslug"
                                    name="slug"
                                    value="{{old('slug',$category->slug)}}"
                              
                                >
                                @if ($errors->has('slug'))
                                    <span class="invalid-feedback"><strong>{{$errors->first('slug')}}</strong></span>
                                @endif
                            </div>

                        </div>
                    <div class="card-footer" >
                        <button type="submit" class="btn btn-success">Save</button>
                        <a  class="btn btn-primary" href="{{route('admin.adverts.categories.index')}}" >Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
