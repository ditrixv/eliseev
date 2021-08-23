@extends('layouts.app')

@section('content')
@include('admin.regions._nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">edit</div>
                <form method="POST" action={{route('admin.regions.update',$region->id) }}>
                    @csrf
                    @method('PUT')
                <div class="card-body">


                    <div class="form-group">
                        <label for="rname">name</label>
                        <input type="text"
                            class="form-control {{$errors->has('name')?' is-invalid': ''}}"
                            id="rname"
                            name="name"
                            value="{{old('name',$region->name)}}"
                            required
                        >
                        @if ($errors->has('name'))
                            <span class="invalid-feedback"><strong>{{$errors->first('name')}}</strong></span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="rslug">slug</label>
                        <input type="text"
                            class="form-control {{$errors->has('slug')?' is-invalid': ''}}"
                            id="rslug"
                            name="slug"
                            value="{{old('slug',$region->slug)}}"
                            required
                        >
                        @if ($errors->has('slug'))
                            <span class="invalid-feedback"><strong>{{$errors->first('slug')}}</strong></span>
                        @endif
                    </div>


{{--
                        <div class="row" for="rslug">
                            <div class="col-4"><label id="rslug">parent:</label></div>
                            <div class="col-8"><strong>{{$region->parent_id}}</strong></div>

                        </div>  --}}
                </div>
                <div class="card-footer d-flex flex-row">
                    <button type="submit" class="btn btn-success mr-1">Save</button>
                    <a  class="btn btn-primary mr-1" href="{{route('admin.regions.index')}}" >Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
