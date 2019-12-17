<ul class="list-unstyled">
    @foreach($posts as $post)
 <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($post->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $post->user->name, ['id' => $post->user->id]) !!}<span class="text-muted">投稿日{{ $post->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($post->content)) !!}</p>
                </div>
                <div class="btn-toolbar">
                    <div class="btn-group">
                        @if(Auth::id() == $post->user_id)
                            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                                {!!Form::submit('削除', ['class' => 'btn btn-danger btn-sm mr-1']) !!}
                            {!! Form::close() !!}
                        @endif
                        
                        @include('favorites.favorite_button', ['posts' => $posts])
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $posts->links('pagination::bootstrap-4') }}