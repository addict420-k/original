@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ action('UserImageController@store') }}" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <input type="file" name="user_image">
        <input type="submit">
    </form>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
@endsection