@extends('layout')

@section('title', 'Editar espacio')

@section('contenido')
<h1 class="h3 mb-3">Editar espacio</h1>

<form action="{{ route('espacios.update', $espacio) }}" method="POST" class="row g-3">
    @csrf
    @method('PUT')

    @include('productos.partials.form')
        

    <div>
        <button class="btn btn-primary">Actualizar</button>
        <a href="{{ route('espacios.index') }}" class="btn btn-light">Cancelar</a>
    </div>
</form>
@endsection