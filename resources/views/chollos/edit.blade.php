<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Chollo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Chollo</h2>
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
                <input type="number" class="form-control" name="precio" value="{{ $chollo->precio }}" required>
            </div>
            <div class="form-group">
                <label for="precio_descuento">Precio Descuento</label>
                <input type="number" class="form-control" name="precio_descuento" value="{{ $chollo->precio_descuento }}">
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
</body>
</html>