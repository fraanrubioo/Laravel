@extends('layouts.app')

@section('title', 'Chollos Destacados - Chollo Severo')

@section('content')
    <h2 class="mt-5">Chollos Destacados ⭐⭐⭐⭐⭐</h2>

    <div class="row justify-content-start">
        @foreach ($chollos as $chollo)
            @if ($chollo->puntuacion == 5)
                <div class="col-md-4 d-flex">
                    <div class="card mb-4" style="width: 100%;">
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
            @endif
        @endforeach
    </div>
@endsection
