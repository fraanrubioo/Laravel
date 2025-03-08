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

    <div class="container mt-5">
        <div class="row">
            <div class="col-5">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 150px;"/>
            </div>
            <div class="col-7">
                <nav class="nav mt-3" style="justify-content: right;">
                    <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                    <a class="nav-link" href="{{ url('/chollos/create') }}">Nuevo Chollo</a>
                </nav>
            </div>
        </div>

        <h2 class="mt-5">Listado de Chollos Disponibles</h2>

        <div class="row">
            @foreach ($chollos as $chollo)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('img/' . $chollo->id . '-chollosevero.jpg') }}" class="card-img-top" alt="Imagen del Chollo">
                        <div class="card-body">
                            <h5 class="card-title">{{ $chollo->titulo }}</h5>
                            <p class="card-text">{{ Str::limit($chollo->descripcion, 100) }}</p>
                            <a href="{{ url('/chollos/' . $chollo->id) }}" class="btn btn-primary">Ver más</a>
                            <a href="{{ url('/chollos/' . $chollo->id . '/edit') }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('chollos.destroy', $chollo->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
