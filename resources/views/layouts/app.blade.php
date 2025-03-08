<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">
    <title>@yield('title', 'Chollo Severo')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

</head>
<body>
    
    <!-- Navbar -->
    <div id="navbar" class="container-fluid bg-light py-3">
        <div class="row align-items-center">
            <div class="col-md-5">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 150px;"/>
            </div>
            <div class="col-md-7 d-flex justify-content-end">
                <nav class="nav">
                    <a class="nav-link" href="{{ url('/') }}">Inicio</a>
                    <a class="nav-link" href="{{ url('/chollos/create') }}">Nuevos</a>
                    <a class="nav-link" href="{{ url('/destacados') }}">Destacados</a>
                </nav>
            </div>
        </div>
    </div>
    
    <!-- Contenido dinámico de cada vista -->
    <div class="container mt-5">
        @yield('content')
    </div>
        
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    <!-- Footer -->
    <footer id="footer" class="py-4 bg-dark text-white text-center mt-5">
        <div class="container">
            <p>&copy; {{ date('Y') }} CholloSevero. Todos los derechos reservados.</p>
            <p>Francisco Javier Iglesias Perez</p>
        </div>
    </footer>


</html>
