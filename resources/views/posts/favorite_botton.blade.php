    @if (Auth::user()->is_favoriting($post->id))
        {!! Form::open(['route' => ['favorites.unfavorite', $post->id], 'method' => 'delete']) !!}
            {!! Form::submit('お気に入り解除', ['class' => "btn btn-danger  btn-sm"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['favorites.favorite', $post->id]]) !!}
            {!! Form::submit('お気に入り', ['class' => "btn btn-primary  btn-sm"]) !!}
        {!! Form::close() !!}
    @endif
