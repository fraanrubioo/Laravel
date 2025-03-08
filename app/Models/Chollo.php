<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chollo extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'precio',
        'precio_descuento',
        'puntuacion',
        'disponible',
        'url',
        'categoria',
    ];
}
