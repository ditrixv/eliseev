@extends('layouts.app')

@section('content')
@include('admin.adverts.categories._nav')

<form method="POST" action={{route('admin.adverts.categories.attributes.update',[$category,$attribute])}} >
    @csrf
    @method('PUT')
    <div class="card-header">Edite attribute</div>
        <div class="card-body">
            <div class="form-group">
                <label for="aname">name</label>
                <input type="text"
                    class="form-control {{$errors->has('name')?' is-invalid': ''}}"
                    id="aname"
                    name="name"
                    value="{{old('name',$attribute->name)??''}}"
                >
                @if ($errors->has('name'))
                    <span class="invalid-feedback"><strong>{{$errors->first('name')}}</strong></span>
                @endif
            </div>

            <div class="form-group">
                <label for="asort">sort</label>
                <input type="text"
                    class="form-control {{$errors->has('sort')?' is-invalid': ''}}"
                    id="asort"
                    name="sort"
                    value="{{old('sort',$attribute->sort)??''}}"
                >
                @if ($errors->has('sort'))
                    <span class="invalid-feedback"><strong>{{$errors->first('sort')}}</strong></span>
                @endif
            </div>
            

            <div class="form-group">
                <label for="type" class="col-form-label">type</label>
                <select class="form-control {{$errors->has('type')?' is-invalid': ''}}" name="type">
                    @foreach ($types as $type => $label)
                    <option value="{{$type}}" {{$type == old('type',$attribute->type)?'selected':''}}>
                        {{$label}}
                    </option>    
                        
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="variants" class="col-form-label">Variants</label>
                <textarea id="variants" type="text" class="form-control{{ $errors->has('sort') ? ' is-invalid' : '' }}" name="variants">
                    {{ old('variants',implode("\n", $attribute->variants))}}
                </textarea>
                @if ($errors->has('variants'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('variants') }}</strong></span>
                @endif
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="required" id="required" {{ old('required',$attribute->required) ? 'checked' : '' }}>

                    <label class="form-check-label" for="required">
                        {{ __('required') }}
                    </label>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success mr-1">Save</button>
            </div>    
        </div>
    </div>    
</form>

@endsection