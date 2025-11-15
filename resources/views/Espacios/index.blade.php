@extends('layout')

@section('title', 'Lista de Espacios')

@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Espacios</h1>
    <a href="{{ route('espacios.create') }}" class="btn btn-primary">Nuevo</a>
</div>

@if($espacios->count())
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Capacidad</th>
                    <th>Ubicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($espacios as $e)
                <tr>
                    <td>{{ $e->id }}</td>
                    <td>{{ $e->nombre }}</td>
                    <td>{{ $e->tipo }}</td>
                    <td>{{ $e->capacidad }}</td>
                    <td>{{ $e->ubicacion }}</td>
                    <td class="d-flex gap-2">
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('espacios.edit', $e) }}">Editar</a>

                        <form action="{{ route('espacios.destroy', $e) }}" method="POST" onsubmit="return confirm('¿Eliminar: {{ $e->nombre }}?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p class="text-muted">No hay espacios registrados aún.</p>
@endif

{{ $espacios->links() }}

@endsection
