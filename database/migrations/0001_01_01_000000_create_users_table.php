<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID único y autoincremental
            $table->string('name'); // Nombre
            $table->string('email')->unique(); // Email único
            $table->string('password'); // Contraseña
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
