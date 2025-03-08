@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Crear Nuevo Chollo</h2>

    <!-- Mostrar errores si los hay -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario de creación de chollo -->
    <form action="{{ route('chollos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" name="descripcion" rows="4" required>{{ old('descripcion') }}</textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio Original (€)</label>
            <input type="number" step="0.01" class="form-control" name="precio" value="{{ old('precio') }}" required>
        </div>

        <div class="form-group">
            <label for="precio_descuento">Precio con Descuento (€)</label>
            <input type="number" step="0.01" class="form-control" name="precio_descuento" value="{{ old('precio_descuento') }}" required>
        </div>

        <div class="form-group">
            <label for="puntuacion">Puntuación (1-5)</label>
            <input type="number" class="form-control" name="puntuacion" min="1" max="5" value="{{ old('puntuacion') }}" required>
        </div>

        <div class="form-group">
            <label for="url">URL</label>
            <input type="url" class="form-control" name="url" value="{{ old('url') }}" required>
        </div>

        <div class="form-group">
            <label for="categoria">Categoría</label>
            <input type="text" class="form-control" name="categoria" value="{{ old('categoria') }}" required>
        </div>

        <div class="form-group">
            <label for="disponible">Disponible</label>
            <select class="form-control" name="disponible">
                <option value="1" {{ old('disponible') == '1' ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ old('disponible') == '0' ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear Chollo</button>
    </form>

    <!-- Botón para volver a la página principal -->
    <a href="{{ url('/') }}" class="btn btn-secondary mt-3">Volver a la Página Principal</a>
</div>
@endsection
