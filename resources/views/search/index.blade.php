@extends('layouts.app')

@section('content')
    <div class="container">
        <hr>


        <hr>
        @foreach($books as $book)
            @if($book->aim==1)
                <div style="display:inline-block;">
                    <a href='/users/{{$book->user}}'>{{$book->user}}</a>
                    <p>i want this books</p>
                    <img src='{{$book->book_way}}' alt='{{$book->body}}'>
                </div>
                <hr>
            @elseif($book->aim==0)
                <div style="display:inline-block;" >
                    <a href='/users/{{$book->user}}'>{{$book->user}}</a>
                    <p>i can give away this books</p>
                    <img src='{{$book->book_way}}' alt='{{$book->body}}'>
                </div>
                <hr>
            @endif


        @endforeach

    </div>
@endsection
