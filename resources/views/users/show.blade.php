@extends('layouts.app')

@section('content')
      <div class="text-left">
          <p><font size="7">{{ Auth::user()->name }}</font></p>
　　　@if (count($posts) > 0)
        @foreach ($posts as $post)
                    <div class="text-left">
                        {{ $post->user->name}}
                        <span class="text-muted">posted at {{ $post->created_at }}</span>
                    <div>
                        <p>{!! nl2br(e($post->title)) !!}&emsp;{!! nl2br(e($post->content)) !!}</p>
                        @include('posts.favorite_botton')
                        @if (Auth::id() == $post->user_id)
                            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                        
                    </div>
                </div>    
            </li>
        @endforeach
    </ul>
    {{ $posts->links() }}
@else
                        <p><font size="7">まだお気に入りがありません。</font></p>
@endif
    </div>
@endsection