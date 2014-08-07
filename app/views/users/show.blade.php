@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <h1>{{ $user->username }}</h1>
            @include('layouts.partials.avatar', ['size' => 100])
        </div>
        <div class="col-md-6">
            @if ($user->is($currentUser))
                @include('statuses.partials.publish-status-form')
            @endif

            @foreach($user->statuses as $status)
                @include('statuses.partials.status')
            @endforeach
        </div>
    </div>
@stop