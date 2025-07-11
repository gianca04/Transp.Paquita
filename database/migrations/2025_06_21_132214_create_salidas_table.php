<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('salidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con la tabla users
            $table->foreignId('producto_id')->constrained()->onDelete('cascade'); // Relación con la tabla productos
            $table->integer('cantidad');
            $table->date('fecha');
            $table->time('hora');
            $table->string('destino');  // Campo destino, se puede aplicar único si es necesario

            $table->timestamps(); // Crea los campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('salidas');
    }
}
