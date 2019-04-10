@extends('layout')

@section('content')

<div class="main">List of books in alphabetical order, click to view more details or make changes.<hr>
      <div style="display: flex;">
        <div style="width: 50vw; margin-right: 50px;">
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
            echo "<div class='container'><h1 class='title is-4 mb5'>
            $currentLetterCap</h1></div>";
            $initial = false;
            }
          echo "
            <div class='container'>
            <a href='/books/$book->id'>
            <b>$book->title</b></a>, <i>$book->author</i>
            </div><hr>";
        }
      }
      }

      @endphp



        <a class="button is-link" href="/books/create">Create a new one...</a>
      <hr>

</div>
      <div class = "mt5" >
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

        <input type="checkbox" name="bought" {{ $wish->bought ? 'checked' : '' }}
         onChange="this.form.submit()">

        <span style='text-decoration: {{$wish->bought ? "line-through" : ""}};
                     color: {{$wish->bought ? "grey" : "black"}}'>
                     {!! $wish->description . ' <p class="is-size-7 has-text-grey"
                     style="display: inline">'. $readyTitle . "</p>" !!} </span>

            </label>
        </form>

        @endforeach

      <!-- And the form for adding a new "Wish" / task -->
      <form method="POST" action="/wishes" class="box mt5">
      @method('PATCH')
      @csrf
        <div class="field">
          <label class="label" for="description">Add to the wishlist...</label>
          <div style="display:flex;">
            <div class="control" >
              <input type="text" style="width: 95%" class="input" name="description"
              placeholder="Add a new title" required>
            </div>
            <button class="button is-link" style="width:30%;" type="submit">Add</button>
          </div>
        </div>
      </form>


</div>
</div>
</div>
  @endsection
