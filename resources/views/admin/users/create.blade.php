@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="POST" action={{route('admin.users.store')}}>
                    @csrf
                    <div class="card-header">create user</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputEmail">email:</label>
                                <input type="email"
                                        class="form-control"
                                        id="inputEmail"
                                        name="email"
                                >
                            </div>

                            <div class="form-group">
                                <label for="inputName">name</label>
                                <input type="text"
                                    class="form-control"
                                    id="inputName"
                                    name="name"
                                >
                            </div>
                        </div>
                    <div class="card-footer" >

                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-success">Create</button>
                            </div>
                            <div class="btn-group" role="group">
                                <a  class="btn btn-primary" href="{{route('admin.users.index')}}" >Cancel</a>
                            </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
