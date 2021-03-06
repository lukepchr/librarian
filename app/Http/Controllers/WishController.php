<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wish;
use App\Book;

class WishController extends Controller
{
    public function update(Wish $wish){

      $wish -> complete(request()->has('bought'));
      // $wish->update([
      //   'bought' => request()->has('bought')
      // ]);
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
          'book_id' => "0" // zero will mean no record related to it - global
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
