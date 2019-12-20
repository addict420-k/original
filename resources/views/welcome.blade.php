@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                @include('users.card', ['user' => $user])
            </aside>
            <div class="col-sm-8">
                @if(Auth::id() == $user->id)
                    {!! Form::open(['route' => 'posts.store', 'files' => true ]) !!}
                    <div class="form-group">
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '10']) !!}
                        {{ csrf_field() }}
                        <input type="file" name="post_image">
                        {!! Form::submit('投稿',['class' => 'btn btn-primary btn-block']) !!}
                    </div>
                    <div>気持ちだけでも発散しましょう。</div>
                    {!! Form::close() !!}
                @endif
                @if(count($posts) > 0)
                    @include('posts.posts', ['posts' => $posts])
                @endif

            </div>
        </div>
    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>煙切りへようこそ</h1>
            <h4>煙との縁を切りましょう</h4>
            {!! link_to_route('signup.get', '新規登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
    @endif
@endsection
