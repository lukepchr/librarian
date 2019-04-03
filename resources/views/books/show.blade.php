@extends('layout')

@section('content')

  <b><h1 class="title is-3">{{ $book->title }}</b></h1><h2 class="subtitle is-5"><i>by {{ $book->author }}</i></h2>
  <div class="content">{{ $book->description }}</div>
<small><i>{{ $book->lent ? 'You lent it to someone!' : 'Currently on your shelf'}}</i></small>
  <div class="content small">Notes: {{ $book->notes }}</div>
  <p>
    <a class="button is-link" href="/books/{{ $book->id }}/edit">Edit</a>
    <a class="button" href="/">Cancel</a>
  </p>



@endsection
