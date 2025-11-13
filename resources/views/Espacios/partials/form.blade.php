<div class="col-md-6">
    <label for="nombre" class="form-label">Nombre</label>
    <input 
        type="text" 
        class="form-control" 
        id="nombre" 
        name="nombre"
        value="{{ old('nombre', $producto->nombre ?? '') }}"
        required>
</div>

<div class="col-md-6">
    <label for="tipo" class="form-label">tipo</label>
    <input 
        type="number" 
        class="form-control" 
        id="tipo" 
        name="tipo"
        value="{{ old('tipo', $producto->tipo ?? '') }}" 
        step="0.01" 
        min="0"
        required>
</div>

<div class="col-md-6">
    <label for="capacidad" class="form-label">capacidad</label>
    <input 
        type="number" 
        class="form-control" 
        id="capacidad"
        name="capacidad"
        value="{{ old('capacidad', $producto->capacidad ?? '') }}" 
        min="0"
        required>
</div>

<div class="col-md-6">
    <label for="ubicacion" class="form-label">ubicacion</label>
    <input 
        type="number" 
        class="form-control" 
        id="ubicacion"
        name="ubicacion"
        value="{{ old('ubicacion', $producto->ubicacion ?? '') }}" 
        min="0"
        required>
</div>