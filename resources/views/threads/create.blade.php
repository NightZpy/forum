@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a new thread</div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a new thread</div>
            </div>
            @if (auth()->check())
                    @include('threads.form')
            @else
                <p>Please, <a href="/login">sign in</a> to add a new discussion!</p>
            @endif
        </div>
    </div>
</div>
@endsection