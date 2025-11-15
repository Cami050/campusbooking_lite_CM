@extends('layout')

@section('title', 'Detalle del Espacio')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Detalle del Espacio</h1>
    <a href="{{ route('espacios.index') }}" class="btn btn-secondary">Volver</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <h4 class="mb-3">{{ $espacio->nombre }}</h4>

        <ul class="list-group mb-3">
            <li class="list-group-item"><strong>ID:</strong> {{ $espacio->id }}</li>
            <li class="list-group-item"><strong>Tipo:</strong> {{ $espacio->tipo }}</li>
            <li class="list-group-item"><strong>Capacidad:</strong> {{ $espacio->capacidad }}</li>
            <li class="list-group-item"><strong>Ubicación:</strong> {{ $espacio->ubicacion }}</li>
        </ul>

        <div class="d-flex gap-2">
            <a href="{{ route('espacios.edit', $espacio) }}" class="btn btn-primary">Editar</a>

            <form action="{{ route('espacios.destroy', $espacio) }}" method="POST"
                onsubmit="return confirm('¿Eliminar: {{ $espacio->nombre }}?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </div>

    </div>
</div>
@endsection
