@extends('layout')

@section('title', 'Crear Reserva')

@section('contenido')
<h1 class="h3 mb-3">Crear Reserva</h1>

<form action="{{ route('reservas.store') }}" method="POST" class="row g-3">
    @csrf

    @include('reservas.partials.form')

    <div>
        <button class="btn btn-primary">Guardar</button>
        <a href="{{ route('reservas.index') }}" class="btn btn-light">Cancelar</a>
    </div>
</form>

@if($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
