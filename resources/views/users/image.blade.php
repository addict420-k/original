@extends('layouts.app')

@section('content')
    <form method="POST" action="/profile-image" enctype="multipart/form-data" >
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