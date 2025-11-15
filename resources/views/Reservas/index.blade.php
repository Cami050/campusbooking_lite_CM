@extends('layout')

@section('title', 'Lista de Reservas')

@section('contenido')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Reservas</h1>
    <a href="{{ route('reservas.create') }}" class="btn btn-primary">Nueva reserva</a>
</div>

{{-- Mensaje de éxito --}}
@if(session('ok'))
    <div class="alert alert-success">
        {{ session('ok') }}
    </div>
@endif

@if($reservas->count())
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Espacio</th>
                    <th>Solicitante</th>
                    <th>Fecha</th>
                    <th>Hora inicio</th>
                    <th>Hora fin</th>
                    <th>Motivo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $r)
                <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->espacio->nombre }}</td>
                    <td>{{ $r->solicitante }}</td>
                    <td>{{ $r->fecha }}</td>
                    <td>{{ $r->hora_inicio }}</td>
                    <td>{{ $r->hora_fin }}</td>
                    <td>{{ $r->motivo ? Str::limit($r->motivo, 30) : '-' }}</td>
                    <td class="d-flex gap-2">
                        <a class="btn btn-sm btn-outline-secondary" 
                           href="{{ route('reservas.edit', $r) }}">Editar</a>

                        <form action="{{ route('reservas.destroy', $r) }}" method="POST"
                              onsubmit="return confirm('¿Eliminar la reserva de {{ $r->solicitante }}?')">
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
    <p class="text-muted">No hay reservas registradas.</p>
@endif

{{ $reservas->links() }}

@endsection
