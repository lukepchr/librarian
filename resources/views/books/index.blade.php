@extends('layout')

@section('content')

  <h2 class="title is-3"><b>Books</b></h2>
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
    echo "<hr><div class='container'><h1 class='title is-4'>
    $currentLetterCap</h1></div>";
      $initial = false;
    }
    echo "
    <div class='container has-margin-5'>
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
  @endsection
