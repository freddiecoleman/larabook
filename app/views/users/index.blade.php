@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>All Users</h1>
            @foreach($users as $user)
                <li>{{ $user->username }}</li>
            @endforeach
        </div>
    </div>
@stop