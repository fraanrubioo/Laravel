@extends('layouts.app')

@section('title', 'Editar Chollo - Chollo Severo')

@section('content')
    <div class="container mt-5">
        <h2>Editar Chollo</h2>

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

        <form action="{{ route('chollos.update', $chollo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" name="titulo" value="{{ $chollo->titulo }}" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" name="descripcion" required>{{ $chollo->descripcion }}</textarea>
            </div>

            <div class="form-group">
                <label for="url">URL</label>
                <input type="url" class="form-control" name="url" value="{{ $chollo->url }}">
            </div>

            <div class="form-group">
                <label for="categoria">Categoría</label>
                <input type="text" class="form-control" name="categoria" value="{{ $chollo->categoria }}" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" step="0.01" class="form-control" name="precio" value="{{ $chollo->precio }}" required>
            </div>

            <div class="form-group">
                <label for="precio_descuento">Precio Descuento</label>
                <input type="number" step="0.01" class="form-control" name="precio_descuento" value="{{ $chollo->precio_descuento }}">
            </div>

            <div class="form-group">
                <label for="disponible">Disponible</label>
                <select name="disponible" class="form-control">
                    <option value="1" {{ $chollo->disponible ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ !$chollo->disponible ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ url('/') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
