@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            @include('layouts.partials.errors')

            <div class="status-post">
                {{ Form::open() }}
                    <div class="form-group">
                        {{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => '3', 'placeholder' => 'What\'s on your mind?']) }}
                    </div>
                    <div class="form-group status-post-submit">
                        {{ Form::submit('Post Status', ['class' => 'btn btn-default btn-xs']) }}
                    </div>
                {{ Form::close() }}
            </div>

            @foreach($statuses as $status)
                <article class="media status-media">
                    <div class="pull-left">
                        <img class="media-object" src="{{ $status->user->present()->gravatar }}" alt="{{ $status->user->username }}">
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">{{ $status->user->username }}</h4>
                        <p>{{ $status->created_at->diffForHumans() }}</p>
                        {{ $status->body }}
                    </div>
                </article>
            @endforeach
        </div>
    </div>
@stop