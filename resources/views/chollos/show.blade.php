<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">
    <title>Chollo Severo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <h1>{{ $chollo->titulo }}</h1>
        <img src="{{ asset('images/' . $chollo->id . '-chollosevero.jpg') }}" class="card-img-top" alt="Imagen del Chollo">
        <p><strong>Categoría:</strong> {{ $chollo->categoria }}</p>
        <p><strong>Precio original:</strong> €{{ number_format($chollo->precio, 2) }}</p>
        <p><strong>Precio con descuento:</strong> €{{ number_format($chollo->precio_descuento, 2) }}</p>
        <p><strong>Descripción:</strong> {{ $chollo->descripcion }}</p>
        <p><strong>Puntuación:</strong> {{ $chollo->puntuacion }}</p>
        <p><strong>Disponible:</strong> {{ $chollo->disponible ? 'Sí' : 'No' }}</p>
        <p><strong>URL:</strong> <a href="{{ $chollo->url }}" target="_blank">{{ $chollo->url }}</a></p>
        
        <a href="{{ url('/') }}" class="btn btn-secondary">Volver al listado</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
