<div class="row">
  <div class="col-sm-6">
      <div class="border border-dark" style="padding:10px;">最新の投稿</div>
@if (count($posts) > 0)
    <ul class="list-unstyled">
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
@endif
</div>
  <div class="col-sm-6">
      <div class="border border-dark" style="padding:10px;">人気の投稿</div>
@if (count($favorites) > 0)
    <ul class="list-unstyled">
        @foreach ($favorites as $favorite)
                    <div class="text-left">
                        {{ $favorite->user->name}}
                        <span class="text-muted">posted at {{ $favorite->created_at }}</span>
                    <div>
                        <p>{!! nl2br(e($favorite->title)) !!}&emsp;{!! nl2br(e($favorite->content)) !!}</p>
                        @include('posts.favorite_botton', ['post' => $favorite])
                        @if (Auth::id() == $favorite->user_id)
                            {!! Form::open(['route' => ['posts.destroy', $favorite->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                        
                    </div>
                </div>    
            </li>
        @endforeach
    </ul>
    {{ $favorites->links() }}
@endif
</div>
</div>