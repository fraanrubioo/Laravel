<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('chollos', function (Blueprint $table) {
            $table->id(); // ID único y autoincremental
            $table->string('titulo'); // Título del chollo
            $table->text('descripcion'); // Descripción
            $table->string('url'); // URL del chollo externo
            $table->string('categoria'); // Categoría
            $table->integer('puntuacion'); // Puntuación
            $table->decimal('precio', 8, 2); // Precio original
            $table->decimal('precio_descuento', 8, 2); // Precio con descuento
            $table->boolean('disponible')->default(true); // Disponibilidad
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('chollos');
    }
};

