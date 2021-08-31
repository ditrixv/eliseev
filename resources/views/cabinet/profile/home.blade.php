
@extends('layouts.app')
@section('content')
@include('cabinet.profile._nav')

<div class="mb-3">
    <a class="btn btn-success" href="{{route('cabinet.profile.edit')}}">Edit</a>
</div>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Name</th>
                <td>
                    {{$user->name}}
                </td>
            </tr>
            <tr>
                <th>Lastname</th>
                <td>
                    {{$user->last_name}}
                </td>
            </tr>
                <th>Email</th>
                <td>
                    {{$user->email}}
                </td>
            </tr>
        </tbody>
    </table>
@endsection
