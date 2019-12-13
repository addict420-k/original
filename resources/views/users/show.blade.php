@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </div>
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a href="#" class="nav-link">自分の投稿一覧</a></li>
                <li class="nav-item"><a href="#" class="nav-link">お気に入り投稿一覧</a></li>
            </ul>
            @if(Auth::id() == $user->id)
                {!! Form::open(['route' => 'posts.store']) !!}
                    <div class="form-group">
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
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