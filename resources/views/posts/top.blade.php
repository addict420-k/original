@extends('layouts.app')

@section('content')
    @include('posts.posts', ['posts' => $posts ])
    @if(Auth::id() == $user->id)
        {!! Form::open(['route' => 'posts.store']) !!}
            <div class="form-group">
                {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '5']) !!}
                {!! Form::submit('投稿',['class' => 'btn btn-primary btn-block']) !!}
            </div>
        {!! Form::close() !!}
    @endif
@endsection