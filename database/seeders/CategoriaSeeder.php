<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Herramientas', 'descripcion' => 'Instrumentos utilizados en diferentes áreas del taller.'],
            ['nombre' => 'Equipos de protección', 'descripcion' => 'Elementos de seguridad personal.'],
            ['nombre' => 'Consumibles', 'descripcion' => 'Materiales de uso frecuente y desgaste.'],
            ['nombre' => 'Documentos', 'descripcion' => 'Formatos y registros usados en los procesos.'],
            ['nombre' => 'Repuestos', 'descripcion' => 'Partes y componentes de reemplazo.'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
