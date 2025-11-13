@extends('layout')
@section('title', 'Reservar espacio')
@section('contenido')

<h1 class="h3 mb-3">Crear Espacio</h1>
    <form action="{{ route('espacios .store') }}" method="POST" class="row g-3"> 
    @csrf

        @include('espacios.partials.form')
        
    <div>
        <button class="btn btn-primary">Guardar</button>
        <a href="{{ route('espacios.index') }}" class="btn btn-light">Cancelar</a>
    </div>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection

