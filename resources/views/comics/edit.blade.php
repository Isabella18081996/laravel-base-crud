

@extends('layouts.main')

@section('content')
  <section class="container">
    <h1 class="mt-3">Modifica: 
      <a href="{{route('comics.show', $comic)}}">{{$comic->title}}</a>
      </h1>
    <div class="row col-8 offset-2 mt-4">
      <form action="{{route('comics.update', $comic)}}" method="post">
        @csrf
        @method('PATCH')

        <div class="mb-2">
          <label for="title" class="form-label">Title</label>
          <input type="text" id="title" name="title" class="form-control" value="{{ $comic->title}}">
        </div>
        <div class="mb-2">
          <label for="description" class="form-label">Description</label>
          <textarea id="description" name="description" class="form-control" rows="10">{{ $comic->description}}</textarea>
        </div>

        <div class="mb-2">
          <label for="price" class="form-label">Price</label>
          <input type="text" id="price" name="price" class="form-control " value="{{ $comic->price}}">
        </div>

         <div class="mb-2">
          <label for="date" class="form-label">Publication Date</label>
          <input type="text" id="date" name="date" class="form-control" value="{{ $comic->date}}">
        </div>

        <div class="mb-2">
          <label for="type" class="form-label">Type</label>
          <input type="text" id="type" name="type" class="form-control" value="{{ $comic->type}}">
        </div>

        <div class="mb-2">
          <label for="image" class="form-label">Image</label>
          <input type="text" id="image" name="image" class="form-control" placeholder="Enter a URL" value="{{ $comic->image}}">
        </div>

        <div class="mb-2">
          <label for="series" class="form-label">Series</label>
          <input type="text" id="series" name="series" class="form-control" value="{{ $comic->series}}">
        </div>



        

        <button type="submit" class="btn btn-primary">INVIA</button>
        <button type="reset" class="btn btn-secondary">RESET</button>
      </form>
    </div>
  </section>

@endsection