@if (count($$favorites) > 0)
    <ul class="list-unstyled">
        @foreach ($favorites as $favorite)
                    <div class="text-left">
                        {{ $favorite->user->name}}
                        <span class="text-muted">posted at {{ $favorite->created_at }}</span>
                    <div>
                        <p>{!! nl2br(e($favorite->title)) !!}&emsp;{!! nl2br(e($$favorite->content)) !!}</p>
                        @include('posts.favorite_botton')
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
    {{ $posts->links() }}
@endif