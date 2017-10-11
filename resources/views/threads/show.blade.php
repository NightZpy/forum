@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="#">{{ $thread->owner->name }}</a> write:
                    {{ str_limit( $thread->title, 12) }}
                </div>

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
                @include('threads.replies.index')
            @endforeach
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (auth()->check())
                    @include('threads.replies.form')
            @else
                <p>Please, <a href="/login">sign in</a> to participate in this discussion!</p>
            @endif
        </div>
    </div>
</div>
@endsection