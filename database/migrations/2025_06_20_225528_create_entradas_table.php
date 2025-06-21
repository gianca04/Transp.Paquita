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
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');  // Correcta convención para la clave foránea
            $table->unsignedBigInteger('producto_id');
            $table->timestamp('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->enum('tipo_documento', ['boleta', 'factura', 'guia']);
            $table->string('numero_documento')->unique();  // Aseguramos que el número de documento sea único
            $table->integer('cantidad');  // La cantidad del producto que entra

            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
