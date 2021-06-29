

@extends('layouts.main')

@section('content')
  <section class="container">
    <h1 class="mt-3">Nuovo Fumetto</h1>
    <div class="row col-8 offset-2 mt-4">
      <form action="{{route('comics.store')}}" method="post">
        @csrf
        @method('POST')

        <div class="mb-2">
          <label for="title" class="form-label">Title</label>
          <input type="text" id="title" name="title" class="form-control">
        </div>
        <div class="mb-2">
          <label for="description" class="form-label">Description</label>
          <textarea id="description" name="description" class="form-control" rows="10"></textarea>
        </div>

        <div class="mb-2">
          <label for="price" class="form-label">Price</label>
          <input type="text" id="price" name="price" class="form-control">
        </div>

         <div class="mb-2">
          <label for="date" class="form-label">Publication Date</label>
          <input type="text" id="date" name="date" class="form-control">
        </div>

        <div class="mb-2">
          <label for="type" class="form-label">Type</label>
          <input type="text" id="type" name="type" class="form-control">
        </div>

        <div class="mb-2">
          <label for="image" class="form-label">Image</label>
          <input type="text" id="image" name="image" class="form-control" placeholder="Enter a URL">
        </div>

        <div class="mb-2">
          <label for="series" class="form-label">Series</label>
          <input type="text" id="series" name="series" class="form-control">
        </div>



        

        <button type="submit" class="btn btn-primary">INVIA</button>
        <button type="reset" class="btn btn-secondary">RESET</button>
      </form>
    </div>
  </section>

@endsection