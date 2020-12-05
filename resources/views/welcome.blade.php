@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @include('posts.posts')
    @else
    <div class="center jumbotron  text-warning bg-white border border-primary">
        <div class="text-center">
            <h1>勉強方法を知ろう</h1>
            {!! link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
    @endif
@endsection