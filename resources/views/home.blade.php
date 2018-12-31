@extends('layouts.app')

@section('content')
<div class="container">
    <div id="root"></div>
    <hr>
        <div style="display:inline-block;">
        <h2>Following</h2>

        @foreach($following as $user)
            <img src="{{$user->avatar}}" alt="">
            <a href="{{route('users',$user)}}">{{$user->name}}</a>
        @endforeach
        <hr>
        <h2>Followers</h2>

        @foreach($followers as $user)
            <img src="{{$user->avatar}}" alt="">
            <a href="{{route('users',$user)}}">{{$user->name}}</a>
        @endforeach
    </div>
</div>
@endsection
