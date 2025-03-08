@extends('layouts.app')

@section('title', $chollo->titulo . ' - Chollo Severo')

@section('content')
    <div class="container">
        <h1>{{ $chollo->titulo }}</h1>

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

        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <p><strong>Categoría:</strong> {{ $chollo->categoria }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p><strong>Precio original:</strong> €{{ number_format($chollo->precio, 2) }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p><strong>Precio con descuento:</strong> €{{ number_format($chollo->precio_descuento, 2) }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p><strong>Descripción:</strong> {{ $chollo->descripcion }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p><strong>Puntuación:</strong> {{ $chollo->puntuacion }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p><strong>Disponible:</strong> {{ $chollo->disponible ? 'Sí' : 'No' }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p><strong>URL:</strong> <a href="{{ $chollo->url }}" target="_blank">{{ $chollo->url }}</a></p>
                </div>
            </div>
        </div>

        
        <a href="{{ url('/') }}" class="btn btn-secondary">Volver al listado</a>
    </div>
@endsection
