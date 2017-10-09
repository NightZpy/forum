@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ str_limit( $thread->title, 12) }}</div>

                <div class="panel-body">
                    <article>
                        <h4>{{ $thread->title }}</h4>
                        <div class="body">{{ $thread->body }}</div>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <h3 class="text-center">Replies</h3>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach ($thread->replies as $reply)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $reply->owner->name }} said {{ $reply->created_at->diffForHumans() }}
                    </div>
                    <div class="panel-body">
                        <article>
                            <div class="body">{{ $reply->body }}</div>
                        </article>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection