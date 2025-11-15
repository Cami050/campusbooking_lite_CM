@extends('layout')

@section('title', 'Editar Reserva')

@section('contenido')
<h1 class="h3 mb-3">Editar Reserva</h1>

<form action="{{ route('reservas.update', $reserva) }}" method="POST" class="row g-3">
    @csrf
    @method('PUT')

    @include('reservas.partials.form')

    <div>
        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('reservas.index') }}" class="btn btn-light">Cancelar</a>
    </div>
</form>
@endsection
