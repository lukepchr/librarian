@extends('layout')
@section('content')
  <h2 class = "subtitle"><b>Add a new book</b></h2>

 <form method="POST" action="/books/">

   {{ csrf_field() }}
  <div class="field">

    <div class="label">
      <label for="title">Title</label>
    </div>

    <div class="control">
      <input type="text" name="title" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" placeholder="Book title" required>
    </div>
  </div>

    <div class="field">
<div class="label">
  <label for="author">Author</label>
</div>
<div class="control">
    <input type="text" name="author" class="input {{ $errors->has('author') ? 'is-danger' : '' }}" placeholder="Author" required>
</div>
  </div>

<div class="field">
<div class="label">
  <label for="description">A few words about the book:</label>
</div>
<div class="control">
   <textarea name="description" class="input {{ $errors->has('description') ? 'is-danger' : '' }}" placeholder="Book description" required></textarea>
</div>
</div>

<div class="field">
<div class="label">
  <label for="notes">Notes:</label>
</div>
<div class = "control">
   <textarea name="notes" class="input {{ $errors->has('notes') ? 'is-danger' : '' }}" placeholder="Your notes..."></textarea>
</div>
</div>
<div class="field">
<input type="checkbox" name="lent" value="true"> Lent it to someone
</div>
<div class="filed">
<button type="submit" class="button is-link">Add new</button>
<a class="button" href="/">Cancel</a>
</div>
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
@endsection
