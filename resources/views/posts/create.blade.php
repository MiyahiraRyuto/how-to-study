@extends('layouts.app')

@section('content')

    <h1>投稿フォーム</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($post, ['route' => 'posts.store']) !!}
    <div class="form-group">
        {!! Form::label('title', 'タイトル:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        {!! Form::label('content', '勉強方法:') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '10']) !!}
    </div>
     {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
</div>
@endsection