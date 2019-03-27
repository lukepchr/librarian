@extends('layout')

@section('content')

  <b><h1 class="title">{{ $book->title }}</b> <i><small>by {{ $book->author }}</i></small></h1>
  <div class="content">{{ $book->description }}</div>
  <div class="content small">Notes: {{ $book->notes }}</div>
  <div>Lent? {{$book->lent}}</div>
  <p>
    <a class="button is-link" href="/books/{{ $book->id }}/edit">Edit</a>
    <a class="button" href="/">Cancel</a>
  </p>



@endsection
