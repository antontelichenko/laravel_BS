@extends('layouts.app')

@section('content')
    <div class="container">
      {{$user->name}}
        <hr>
        @if(Auth::user()->isNotTheUser($user))
            @if(Auth::user()->isFollowing($user))
                <a href="{{route('users.unfollow', $user)}}">Unfollow</a>
            @else
                <a href="{{route('users.follow', $user)}}">Follow</a>
            @endif
        @endif

        <hr>
      @foreach($books as $book)
        @if($book->aim==1)
                <div style="display:inline-block;">
                    <p>i want this books</p>
                    <img src='{{$book->book_way}}' alt='{{$book->body}}'>
                    {{$book->body}}
                </div>
                <hr>
        @elseif($book->aim==0)
              <div style="display:inline-block;" >
                <p>i can give away this books</p>
                <img src='{{$book->book_way}}' alt='{{$book->body}}'>
                  {{$book->body}}
              </div>
                <hr>
        @endif


        @endforeach

    </div>
@endsection
