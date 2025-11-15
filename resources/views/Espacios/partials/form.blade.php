<div class="col-md-6">
    <label for="nombre" class="form-label">Nombre</label>
    <input 
        type="text" 
        class="form-control" 
        id="nombre" 
        name="nombre"
        value="{{ old('nombre', $espacio->nombre ?? '') }}"
        required>
</div>

<div class="col-md-6">
    <label for="tipo" class="form-label">Tipo</label>
    <input 
        type="text" 
        class="form-control" 
        id="tipo" 
        name="tipo"
        value="{{ old('tipo', $espacio->tipo ?? '') }}"
        required>
</div>

<div class="col-md-6">
    <label for="capacidad" class="form-label">Capacidad</label>
    <input 
        type="number" 
        class="form-control" 
        id="capacidad"
        name="capacidad"
        value="{{ old('capacidad', $espacio->capacidad ?? '') }}"
        min="1"
        required>
</div>

<div class="col-md-6">
    <label for="ubicacion" class="form-label">Ubicación</label>
    <input 
        type="text" 
        class="form-control" 
        id="ubicacion"
        name="ubicacion"
        value="{{ old('ubicacion', $espacio->ubicacion ?? '') }}"
        required>
</div>
