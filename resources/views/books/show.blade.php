@extends('layout')

@section('content')
<div class="container  mt5">
  <b><h1 class="title is-3">{{ $book->title }}</b></h1><h2 class="subtitle is-5"><i>by {{ $book->author }}</i></h2>
  <div class="content">{{ $book->description }}</div>

@if($book->wishes->count())
    <div class="container mb20">
      <h2 class="title is-5 p0">Related wishlist items</h2>
    @foreach ($book->wishes as $wish)

    <form method="POST" action="/wishes/{{ $wish->id }}">
      @method('PATCH')
      @csrf
      <label class="checkbox" for="bought">

        <input type="checkbox" name="bought" onChange="this.form.submit()">

          {{ $wish->description }}

        </label>
    </form>

    @endforeach
    </div>
@endif


<div class="container mb20">
  <h2 class="title is-5 p0">Status & condition</h2>
  <li><i>{{ $book->lent ? 'You lent it to someone!' : 'Currently on your shelf'}}</i></li>
  <li>Notes: {{ $book->notes }}</li>
</div></div>

  <p>
    <a class="button is-link" href="/books/{{ $book->id }}/edit">Edit</a>
    <a class="button" href="/">Cancel</a>
  </p>
  <hr>



@endsection
