<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->string('ip_address')->nullable()->after('user_id'); // Agrega la columna ip_address
            $table->string('user_agent')->nullable()->after('ip_address'); // Agrega la columna user_agent
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->dropColumn('ip_address'); // Elimina la columna ip_address si se revierte
            $table->dropColumn('user_agent'); // Elimina la columna user_agent si se revierte
        });
    }
};
