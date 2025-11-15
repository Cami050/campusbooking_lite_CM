@extends('layout')

@section('title', 'Detalle de la reserva')

@section('contenido')

<h1 class="h3 mb-3">Detalle de la reserva</h1>

<div class="card p-3">
    <p><strong>Espacio:</strong> {{ $reserva->espacio->nombre }}</p>
    <p><strong>Solicitante:</strong> {{ $reserva->solicitante }}</p>
    <p><strong>Fecha:</strong> {{ $reserva->fecha }}</p>
    <p><strong>Hora inicio:</strong> {{ $reserva->hora_inicio }}</p>
    <p><strong>Hora fin:</strong> {{ $reserva->hora_fin }}</p>
    <p><strong>Motivo:</strong> {{ $reserva->motivo ?? '-' }}</p>
</div>

<a href="{{ route('reservas.index') }}" class="btn btn-light mt-3">Volver</a>

@endsection
