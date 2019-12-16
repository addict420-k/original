@extends('layouts.app')

@section('content')
    <form method="POST" action="/profile" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <input type="file" name="photo">
        <input type="submit">
    </form>
    @if ($is_image)
        <figure>
            <img src="/storage/profile_images/{{ \Auth::user()->id }}.jpeg" width="100px" height="100px">
            <figcaption>現在のプロフィール画像</figcaption>
        </figure>
    @endif
    @if(session('success'))
         <div class="alert alert-success">
             {{ session('success') }}
         </div>
    @endif
@endsection