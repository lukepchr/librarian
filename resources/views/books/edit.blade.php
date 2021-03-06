@extends('layout')
@section('content')
<div class="container">
  <h2 class="subtitle"><b>Edit Project</b></h2>

<form method="POST" action="/books/{{ $book->id }}">

    {{ method_field('PATCH') }}
    {{ csrf_field() }}

    <div class="field">
      <div class="label">
        <label class="label" for="title">Title</label>
      </div>
      <div class="control">
        <input type="text" class="input" name="title" placeholder ="title" value="{{ $book->title }}" required>
      </div>
    </div>

    <div class="field">
      <div class="label">
        <label class="label" for="author">Author</label>
      </div>
      <div class="control">
        <input type="text" class="input" name="author" placeholder ="author" value="{{ $book->author }}" required>
      </div>
    </div>


      <div class="field">
        <div class="label">
        <label class="label" for="description">Description</label>
        </div>
        <div class="control">
        <textarea name="description" class="textarea" required>{{ $book->description }}</textarea>
      </div>
    </div>

    <div class="field">
      <div class="label">
        <label class="label" for="notes">Notes</label>
      </div>
      <div class="control">
        <textarea name="notes" class="textarea" required>{{ $book->notes }}</textarea>
      </div>
    </div>

    <div class="field">
      <input type="hidden" name="lent" value=""> <!--clever fallback value-->
      <input type="checkbox" name="lent" value="true" {{ $book->lent ? 'checked' : ''}}>  Lent it to someone
    </div>

    <div class="level">
      <div class="control">
        <button type="submit" class="button is-link">Update project</button>
      </div>
    </div>
</form>

    <form method="POST" action="/books/{{ $book->id }}">
        {{ method_field('DELETE')}}
        {{ csrf_field() }}
        <button type="submit" class="button is-warning">Delete book</button>
        <a class="button" href="/">Cancel</a>
    </form>
</div>
  @endsection
