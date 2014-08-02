@extends('layouts.default')

@section('content')
    <h1>Post a status</h1>

    {{ Form::open() }}
        <div class="form-group">
            {{ Form::label('status', 'Status:') }}
            {{ Form::textarea('status', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Post Status', ['class' => 'btn btn-primary']) }}
        </div>
    {{ Form::close() }}
@stop