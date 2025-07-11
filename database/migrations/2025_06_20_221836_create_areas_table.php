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
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nombre')->unique();
            $table->string('descripcion')->nullable();

        });

               // Tabla Sub_Areas
        Schema::create('sub_areas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area_id'); // Clave foránea que hace referencia a 'areas'
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->timestamps();

            // Relación con la tabla Areas
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
                Schema::dropIfExists('sub_areas');
        Schema::dropIfExists('areas');
    }
};
