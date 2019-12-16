@if (Auth::user()->is_favorite($post->id))
    {!! Form::open(['route' => ['favorites.unfavorite', $post->id], 'method' => 'delete']) !!}
        {!! Form::button('<i class="fa fa-heart"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['favorites.favorite', $post->id]]) !!}
        {!! Form::button('<i class="fa fa-heart"></i>', ['type' => 'submit', 'class' => "btn btn-primary btn-sm"]) !!}
    {!! Form::close() !!}
@endif