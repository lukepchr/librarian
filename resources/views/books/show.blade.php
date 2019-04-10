@extends('layout')

@section('content')
<div class="container  mt5 box">
  <b><h1 class="title is-3">{{ $book->title }}</b></h1><h2 class="subtitle is-5"><i>by {{ $book->author }}</i></h2>
  <div class="content">{{ $book->description }}</div>

<div class="container mb20">
  <h2 class="title is-5 p0">Status & condition</h2>
  <li><i>{{ $book->lent ? 'You lent it to someone!' : 'Currently on your shelf'}}</i></li>
  <li>Notes: {{ $book->notes }}</li>
</div></div>

@if($book->wishes->count())
    <div class="container mb20 box">
      <h2 class="title is-5 p0">Related wishlist items</h2>
    @foreach ($book->wishes as $wish)

    <form method="POST" action="/wishes/{{ $wish->id }}">
      @method('PATCH')
      @csrf
      <label class="checkbox" for="bought">

        <input type="checkbox" name="bought" {{ $wish->bought ? 'checked' : '' }} onChange="this.form.submit()">

<span style='text-decoration: {{$wish->bought ? "line-through" : ""}}'>
          {{ $wish->description }} </span>

        </label>
    </form>

    @endforeach
    </div>
@endif
<form method="POST" action="/books/{{ $book->id }}/wishes" class="box">
@method('PATCH')
@csrf
    <div class="field">
      <label class="label" for="description">Add to the wishlist...</label>
<div class="level">
  <div class="level-left">
        <div class="control level-item">
          <input type="text" class="input" name="description" placeholder="Add a new title" required>
        </div>
        <button class="button is-link level-item" type="submit">Add</button>
    </div>
  </div>
  </div>
</form>

  <p>
    <a class="button is-link" href="/books/{{ $book->id }}/edit">Edit</a>
    <a class="button" href="/">Cancel</a>
  </p>
  <hr>



@endsection

@if ($errors->any())
  <div class="notification is-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li> {{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
     </form>
