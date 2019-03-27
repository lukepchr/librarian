@extends('layout')

@section('content')

  <b><h1 class="subtitle">{{ $book->title }}</b> <i><small>by {{ $book->author }}</i></small></h1>
  <div class="content">{{ $book->description }}</div>
<small><i>{{ $book->lent ? 'You borrowed it to someone!' : 'Currently on your shelf'}}</i></small>
  <div class="content small">Notes: {{ $book->notes }}</div>
  <p>
    <a class="button is-link" href="/books/{{ $book->id }}/edit">Edit</a>
    <a class="button" href="/">Cancel</a>
  </p>



@endsection
