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
            ['nombre' => 'Lubricantes', 'descripcion' => 'Aceites y grasas para el mantenimiento de vehículos.'],
            ['nombre' => 'Neumáticos', 'descripcion' => 'Llantas y accesorios relacionados para vehículos de transporte.'],
            ['nombre' => 'Accesorios', 'descripcion' => 'Complementos y piezas adicionales para vehículos.'],
            ['nombre' => 'Herramientas eléctricas', 'descripcion' => 'Instrumentos eléctricos utilizados en el taller.'],
            ['nombre' => 'Pinturas y acabados', 'descripcion' => 'Materiales para la estética y protección de vehículos.'],
            ['nombre' => 'Sistemas eléctricos', 'descripcion' => 'Componentes eléctricos y electrónicos de vehículos.'],
            ['nombre' => 'Sistemas de frenos', 'descripcion' => 'Partes y repuestos para el sistema de frenado.'],
            ['nombre' => 'Sistemas de suspensión', 'descripcion' => 'Componentes para el sistema de suspensión de vehículos.'],
            ['nombre' => 'Sistemas de transmisión', 'descripcion' => 'Partes relacionadas con la transmisión de vehículos.'],
            ['nombre' => 'Sistemas de escape', 'descripcion' => 'Componentes para el sistema de escape de vehículos.'],
            ['nombre' => 'Materiales', 'descripcion' => 'Materiales diversos utilizados en el taller y mantenimiento.'],
            ['nombre' => 'Protectores', 'descripcion' => 'Elementos de protección para neumáticos y componentes.'],
            ['nombre' => 'Aros', 'descripcion' => 'Aros y rines para vehículos de transporte.'],
            ['nombre' => 'Cámaras', 'descripcion' => 'Cámaras de aire para neumáticos.'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::updateOrCreate(
                ['nombre' => $categoria['nombre']],
                $categoria
            );
        }
    }
}
