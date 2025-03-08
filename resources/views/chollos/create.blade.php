@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Nuevo Chollo</h2>
    <form action="{{ route('chollos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" name="descripcion" required></textarea>
        </div>
        <div class="form-group">
            <label for="precio">Precio Original (€)</label>
            <input type="number" step="0.01" class="form-control" name="precio" required>
        </div>
        <div class="form-group">
            <label for="precio_descuento">Precio con Descuento (€)</label>
            <input type="number" step="0.01" class="form-control" name="precio_descuento" required>
        </div>
        <div class="form-group">
            <label for="puntuacion">Puntuación (1-5)</label>
            <input type="number" class="form-control" name="puntuacion" min="1" max="5" required>
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <input type="url" class="form-control" name="url" required>
        </div>
        <div class="form-group">
            <label for="categoria">Categoría</label>
            <input type="text" class="form-control" name="categoria" required>
        </div>
        <div class="form-group">
            <label for="disponible">Disponible</label>
            <select class="form-control" name="disponible">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Crear Chollo</button>
    </form>
</div>
@endsection
