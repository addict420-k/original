<ul class="list-unstyled">
    @foreach($posts as $post)
 <li class="media mb-3">
     
            @if($post->user->image == null)
              <img class="mr-2 rounded" src="{{ Gravatar::src($post->user->email, 50) }}" alt="" style="max-height:50px">
            @else
              <img class="mr-2 rounded" src="{{ $post->user->image }}" alt="" style="max-height:50px">
            @endif
            
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $post->user->name, ['id' => $post->user->id]) !!}<span class="text-muted">投稿日{{ $post->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($post->content)) !!}</p>
                    <img  style="max-height:150px" class="rounded img-fluid" src="{{$post->post_image}}" alt="">
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