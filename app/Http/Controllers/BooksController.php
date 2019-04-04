<?php

namespace App\Http\Controllers;

use App\Book;

class BooksController extends Controller
{
    public function friends(){
      $books = Book::all();
      return view('books.friends', compact('books'));
    }
    public function index(){
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create(){
      return view('books.create');
    }

    public function store(){
      request()->validate([
        'title' => 'required',
        'description' => 'required'
      ]);
      if(request ('lent') == 'true'){
      // converting HTML form string "true" to boolean
        $lent= true;
      }
      else {
        $lent = false;
      }

      Book::create([
        'title' => request('title'),
        'author' => request('author'),
        'description' => request ('description'),
        'notes' => request('notes'),
        'lent' => $lent
      ]);

      return redirect('/');
    }

    public function show(Book $book ){
      return view('books.show', compact('book'));
    }

    public function edit($id){
      $book = Book::find($id);


      return view('books.edit', compact('book'));
    }
    public function update(Book $book){

      $book->update(request(['title', 'author', 'description', 'notes', 'lent']));

      return redirect('/');
    }
    public function destroy(Book $book){
      $book->delete();
      return redirect('/books');
    }

}
