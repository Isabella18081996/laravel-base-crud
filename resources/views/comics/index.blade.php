@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>I NOSTRI FUMETTI</h1>
        @if (session('deleted'))
          <div class="alert alert-success" role="alert"><strong>{{session('deleted')}}</strong> è stato eliminato correttamente</div>
        @endif
        <section class="container">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>TITLE</th>
                <th>TYPE</th>
                <th colspan="3">ACTIONS</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($comics as $comic)
              <tr>
                <td>{{$comic->id}}</td>
                <td>{{$comic->title}}</td>
                <td>{{$comic->type}}</td>
                <td>
                  <a href="{{ route('comics.show', $comic)}}" class="btn btn-success">SHOW</a>
                </td>
                <td>
                  <a href="{{ route('comics.edit', $comic->id)}}" class="btn btn-warning">EDIT</a>
                </td>
                <td>
                  <form action="{{ route('comics.destroy', $comic)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">DELETE</button>
                  </form>
                </td>


              </tr>
                
              @endforeach
            </tbody>
          </table>
        </section>
        <section class="container">
          {{ $comics->links() }}
      </section>
    </div>
@endsection


{{-- @extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Le nostre paste</h1>
        <section class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comics as $comic)
                        <tr>
                            <td>{{ $comic->id }}</td>
                            <td>{{ $comic->title }}</td>
                            <td>{{ $comic->type }}</td>
                            <td>
                                <a href="{{ route('comic.show', $comic) }}" class="btn btn-success">SHOW</a>
                            </td>
                            <td>EDIT</td>
                            <td>DELETE</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </section>
        <section class="container">
            {{ $comics->links() }}
        </section>
    </div>
@endsection --}}