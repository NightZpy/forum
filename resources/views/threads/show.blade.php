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
                    <article>
                        <h4>Replies</h4>
                        @foreach ($thread->replies as $reply)
                            <hr>
                            <div class="body">{{ $reply->body }}</div>
                        @endforeach
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection