@extends('layouts.app')
@section('breadcrumb')
    <!-- <ul class="breadcrumb">
        <li class="breadcrumb-item active"><a href="{{route('home')}}">Home</a></li>
    </ul> -->

    {!! Breadcrumbs::render() !!}

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hello</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    Your site
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
