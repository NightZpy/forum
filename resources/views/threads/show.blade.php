@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
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
                <h3 class="text-center">Replies</h3>
                @foreach ($replies as $reply)
                    @include('threads.replies.index')
                @endforeach
                {{ $replies->links() }}

                @if (auth()->check())
                    @include('threads.replies.form')
                @else
                    <p>Please, <a href="/login">sign in</a> to participate in this discussion!</p>
                @endif
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <article>
                            <p>
                                This thread was published {{ $thread->created_at->diffForHumans() }}, has
                                {{ $thread->repliesCountTxt }} and was
                                created by
                                <a href="#">{{ $thread->owner->name }}</a>.
                            </p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection