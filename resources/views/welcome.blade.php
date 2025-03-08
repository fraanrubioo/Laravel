<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">
    <title>Chollo Severo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>

    <div class="container mt-5">
        <div id="navbar" class="row">
            <div class="col-5">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 150px;"/>
            </div>
            <div class="col-7">
                <nav class="nav mt-3" style="justify-content: right;">
                    <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                    <a class="nav-link" href="{{ url('/chollos/create') }}">Nuevos</a>
                    <a class="nav-link" href="{{ url('/destacados') }}">Destacados</a>
                </nav>
            </div>
        </div>

        <h2 class="mt-5">Listado de Chollos Disponibles</h2>

        <div class="row">
            @foreach ($chollos as $chollo)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <!-- Verificación de la existencia de la imagen -->
                        @php
                            $extensions = ['jpg', 'png', 'webp'];
                            $imagePath = null;
                            foreach ($extensions as $extension) {
                                if (file_exists(public_path('images/' . $chollo->id . '-chollosevero.' . $extension))) {
                                    $imagePath = 'images/' . $chollo->id . '-chollosevero.' . $extension;
                                    break;
                                }
                            }
                        @endphp

                        <!-- Mostrar la imagen si existe, si no, mostrar una imagen por defecto -->
                        @if ($imagePath)
                            <img src="{{ asset($imagePath) }}" class="card-img-top" alt="Imagen del Chollo">
                        @else
                            <img src="{{ asset('images/default-image.png') }}" class="card-img-top" alt="Imagen por defecto">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $chollo->titulo }}</h5>
                            <p class="card-text">{{ Str::limit($chollo->descripcion, 100) }}</p>
                            <p class="precio">
                                <span class="text-muted" style="text-decoration: line-through;">{{ number_format($chollo->precio, 2, ',', '.') }}€</span> 
                                <span class="text-danger font-weight-bold">{{ number_format($chollo->precio_descuento, 2, ',', '.') }}€</span>
                            </p>
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
<footer class="py-4 mt-5">
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} CholloSevero. Todos los derechos reservados.</p>
            <p>Francisco Javier Iglesias Perez</p>
        </div>
    </footer>
</html>
