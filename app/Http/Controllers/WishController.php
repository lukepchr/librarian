<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wish;
use App\Book;

class WishController extends Controller
{
    public function update(Wish $wish){
      $wish->update([
        'bought' => request()->has('bought')
      ]);
      return back();
}
      public function store(Book $book){


      if(isset($book->id)){ // User added a "wish" not related to any book
        $validated = request()->validate(['description' => 'required']);
        $book->addWish($validated);

      }
      else{

        Wish::create([
          'description' => request('description'),
          'book_id' => "0"
]);
}
      //  // This works too.
      //   Wish::create([
      //     'description' => request('description'),
      //     'book_id' => $book->id
      //   ]);
      return back();

    }
}
