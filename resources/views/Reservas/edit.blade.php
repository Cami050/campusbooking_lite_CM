@extends('layout')

@section('title', 'Editar Reserva')

@section('contenido')

<h1 class="h3 mb-3">Editar Reserva</h1>

{{-- ✔ Mensaje de éxito --}}
@if(session('ok'))
    <div class="alert alert-success">
        {{ session('ok') }}
    </div>
@endif

{{-- ✔ Errores de validación --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Corrige los siguientes errores:</strong>
        <ul class="mt-2 mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('reservas.update', $reserva) }}" method="POST" class="row g-3">
    @csrf
    @method('PUT')

    {{-- ✔ Formulario reutilizable --}}
    @include('reservas.partials.form')

    <div>
        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('reservas.index') }}" class="btn btn-light">Cancelar</a>
    </div>
</form>

@endsection
