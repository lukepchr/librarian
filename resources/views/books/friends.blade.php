@extends('layout')

@section('content')

  <div class="mt5">Hi, this is my list of books. This view is <b>read only</b> because you are not <a href='/'>logged in.</a></div>
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

  @endsection
