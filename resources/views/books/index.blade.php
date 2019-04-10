@extends('layout')

@section('content')
<div class="container">

<div class="mt5" style="width: 70vw">List of books in alphabetical order, click to view more details or make changes.
@php
$alpha = (range('a', 'z'));

for($a = 0; $a < sizeof($alpha); $a++){
  $currentLetter = $alpha[$a];
  $initial = true;
foreach($books as $book){
  $firstLetter = strtolower($book->title[0]);
  if($firstLetter==$currentLetter)
  {
    if($initial){
      $currentLetterCap=strtoupper($currentLetter);
      echo "<hr><div class='container'><h1 class='title is-4 mb5'>
      $currentLetterCap</h1></div>";
      $initial = false;
      }
      echo "
      <div class='container'>
      <a href='/books/$book->id'>
      <b>$book->title</b></a>, <i>$book->author</i>
      </div>";
  }
}
}

@endphp


  <hr>
  <a class="button is-link" href="/books/create">Create a new one...</a>
<hr>
</div>
<div class = "mt5" >
<div class="container">
  <h2 class="subtitle">Wishlist</h2>

  @foreach ($wishes as $wish)

  @php
    $selected = $books->where('id', $wish->book_id);
    if(isset($selected->first()->title)){
      $readyTitle = 'related to "' . $selected->first()->title.'"';
    }
    else{
      $readyTitle = null;
    }
  @endphp

  <form method="POST" action="/wishes/{{ $wish->id }}">
    @method('PATCH')
    @csrf
    <label class="checkbox" for="bought">

      <input type="checkbox" name="bought" {{ $wish->bought ? 'checked' : '' }} onChange="this.form.submit()">

  <span style='text-decoration: {{$wish->bought ? "line-through" : ""}};
                color: {{$wish->bought ? "grey" : "black"}}'>
        {!! $wish->description . ' <p class="is-size-7 has-text-grey" style="display: inline">'. $readyTitle . "</p>" !!} </span>

      </label>
  </form>

  @endforeach

<!-- And the form for adding a new "Wish" / task -->
<form method="POST" action="/wishes" class="box">
@method('PATCH')
@csrf
    <div class="field">
      <label class="label" for="description">Add to the wishlist...</label>
<div class="level">
  <div class="level-left">
        <div class="control level-item">
          <input type="text" class="input" name="description" placeholder="Add a new title">
        </div>
        <button class="button is-link level-item" type="submit">Add</button>
    </div>
  </div>
  </div>
</form>



</div>
</div>
</div>

</div>
  @endsection
