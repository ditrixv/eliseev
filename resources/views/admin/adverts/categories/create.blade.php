@extends('layouts.app')

@section('content')
@include('admin.adverts.categories._nav')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="POST" action={{route('admin.adverts.categories.store')}}  enctype="multipart/form-data" >
                    @csrf
                    <div class="card-header">create category</div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="cname">name</label>
                                <input type="text"
                                    class="form-control {{$errors->has('name')?' is-invalid': ''}}"
                                    id="cname"
                                    name="name"
                                    value="{{old('name')??''}}"
                                >
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback"><strong>{{$errors->first('name')}}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                            <label for="cname">slug</label>
                                <input type="text"
                                    class="form-control {{$errors->has('name')?' is-invalid': ''}}"
                                    id="cslug"
                                    name="slug"
                                    value="{{old('slug')??''}}"
                                >
                                @if ($errors->has('slug'))
                                    <span class="invalid-feedback"><strong>{{$errors->first('slug')}}</strong></span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="uparent">parent category</label>
                                <select name="parent" class="form-control" id="cparent">
                                    <option value=""></option>
                                    @foreach ( $parents as $parent)
                                        <option
                                            value="{{$parent->id}}" {{$parent->id === old('parent')?' selected':''}}>
                                           
                                            @for ($i = 0; $i < $parent->depth; $i++)
                                              &mdash;
                                            @endfor
                                            {{$parent->name}}
                                        </option>
    
                                    @endforeach
                                </select>  
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success mr-1">Create</button>
                                <a  class="btn btn-primary mr-1" href="{{route('admin.adverts.categories.index')}}" >Cancel</a>
        
                            </div>    

                        </div>
                    </div>    

 
                </form>
                
            </div>
        </div>
    </div>
</div>

@endsection

