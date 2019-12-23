@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card',['user' => $user])
            
            @if(Auth::id() == $user->id)
                {!! link_to_route('profileImage.get', '画像登録・変更', [], ['class' => 'btn btn-lg btn-primary']) !!}
            
                <form method="POST" action="/start-time">
                    {{ csrf_field() }}
                <input type="submit" value="禁煙スタート・禁煙リセット">
            @endif
        
            @if($user->start_time != null)
                <div>禁煙開始日{{ $user->start_time}}</div>
                <div>禁煙開始から{{ $user->start_time->diffInDays(\Carbon\Carbon::now()) }}日経過</div>
            @endif
        </form>
    
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user', $user])
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
@endsection