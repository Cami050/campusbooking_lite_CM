<div class="col-md-6">
    <label for="nombre" class="form-label">Nombre</label>
    <input 
        type="text" 
        name="nombre" 
        id="nombre" 
        class="form-control" 
        value="{{ old('nombre', $vendedor->nombre ?? '') }}" 
        required>
</div>

<div class="col-md-6">
    <label for="cargo" class="form-label">Cargo</label>
    <input 
        type="text" 
        name="cargo" 
        id="cargo" 
        class="form-control" 
        value="{{ old('cargo', $vendedor->cargo ?? '') }}" 
        required>
</div>

<div class="col-md-6">
    <label for="telefono" class="form-label">Teléfono</label>
    <input 
        type="number" 
        name="telefono" 
        id="telefono" 
        class="form-control" 
        value="{{ old('telefono', $vendedor->telefono ?? '') }}" 
        required>
</div>

<!-- Ejemplo -->

<select name="espacio_id" class="form-select" required>
    <option value="">Seleccione un espacio...</option>
    @foreach($espacios as $e)
        <option value="{{ $e->id }}" {{ old('espacio_id', $reserva->espacio_id ?? '') == $e->id ? 'selected' : '' }}>
            {{ $e->nombre }}
        </option>
    @endforeach
</select>