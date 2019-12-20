@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card',['user' => $user])
            {!! link_to_route('profileImage.get', '画像登録・変更', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user', $user])
            @if(Auth::id() == $user->id)
                {!! Form::open(['route' => 'posts.store']) !!}
                    <div class="form-group">
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '5']) !!}
                        {!! Form::submit('投稿',['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            @endif
            @if(count($posts) > 0)
                @include('posts.posts', ['posts' => $posts])
            @endif
        </div>
    </div>
@endsection