@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => 'posts.store']) !!}
    <div class="form-group">
        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '10']) !!}
        {!! Form::submit('投稿',['class' => 'btn btn-primary btn-block']) !!}
    </div>
    <div>気持ちだけでも発散しましょう。</div>
{!! Form::close() !!}
@endsection


