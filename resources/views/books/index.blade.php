@extends('layout')

@section('content')

  <h2 class="subtitle">Books</h2>

  @foreach ($books as $book)

    <li>
<a href="/books/{{$book->id}}">
      <b>{{$book->title}}</b></a>, <i>{{$book->author}}</i></li>

  @endforeach

  <a class="button is-link" href="/books/create">Create a new one...</a>

  @endsection
