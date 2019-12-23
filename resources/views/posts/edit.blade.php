

@extends('layouts.app')

@section('content')
    変更画面
    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put', 'files' => true]) !!}
    <div class="form-group">
        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '10']) !!}
        {{ csrf_field() }}
        <input type="file" name="post_image">
        {!! Form::submit('投稿',['class' => 'btn btn-primary btn-block']) !!}
    </div>
    <div>気持ちだけでも発散しましょう。</div>
    {!! Form::close() !!}
@endsection

