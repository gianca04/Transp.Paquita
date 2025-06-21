<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->constrained()->onDelete('cascade'); // Relación con productos
            $table->string('medida');  // Unidad de medida (ej. "kg", "litros", "unidad")
            $table->decimal('cantidad', 10, 2);  // Cantidad con dos decimales (ej. 10.5 kg)
            $table->decimal('minimo', 10, 2);  // Mínimo de stock con decimales
            $table->decimal('maximo', 10, 2);  // Máximo de stock con decimales

            // Aseguramos que cada producto tenga un solo registro en stock
            $table->unique('producto_id');  // Hace que producto_id sea único

            $table->timestamps(); // Crea las columnas created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
}
