@extends('layouts.main')

@section('content')
    <div class="container text-center pt-5">
        <h1>Errore 404</h1>
        <h3>Pagina non trovata</h3>
        <p>{{ $exception->getMessage() }}</p>
    </div>
@endsection