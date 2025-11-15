<div class="col-md-6">
    <label for="solicitante" class="form-label">Solicitante</label>
    <input 
        type="text" 
        name="solicitante" 
        id="solicitante" 
        class="form-control" 
        value="{{ old('solicitante', $reserva->solicitante ?? '') }}" 
        required>
</div>

<div class="col-md-6">
    <label for="espacio_id" class="form-label">Espacio</label>
    <select name="espacio_id" id="espacio_id" class="form-select" required>
        <option value="">Seleccione un espacio...</option>
        @foreach($espacios as $e)
            <option value="{{ $e->id }}" 
                {{ old('espacio_id', $reserva->espacio_id ?? '') == $e->id ? 'selected' : '' }}>
                {{ $e->nombre }}
            </option>
        @endforeach
    </select>
</div>

<div class="col-md-4">
    <label for="fecha" class="form-label">Fecha</label>
    <input 
        type="date" 
        name="fecha" 
        id="fecha" 
        class="form-control" 
        value="{{ old('fecha', $reserva->fecha ?? '') }}" 
        required>
</div>

<div class="col-md-4">
    <label for="hora_inicio" class="form-label">Hora inicio</label>
    <input 
        type="time" 
        name="hora_inicio" 
        id="hora_inicio" 
        class="form-control" 
        value="{{ old('hora_inicio', $reserva->hora_inicio ?? '') }}" 
        required>
</div>

<div class="col-md-4">
    <label for="hora_fin" class="form-label">Hora fin</label>
    <input 
        type="time" 
        name="hora_fin" 
        id="hora_fin" 
        class="form-control" 
        value="{{ old('hora_fin', $reserva->hora_fin ?? '') }}" 
        required>
</div>

<div class="col-12">
    <label for="motivo" class="form-label">Motivo</label>
    <textarea 
        name="motivo" 
        id="motivo" 
        class="form-control" 
        rows="3">{{ old('motivo', $reserva->motivo ?? '') }}</textarea>
</div>
