@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Threads for channel: {{ $channel->name }}</div>

                <div class="panel-body">
                    @foreach ($channel->threads as $thread)
                        <article>
                            <h4><a href="{{ $thread->path }}">{{ $thread->title }}</a></h4>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
