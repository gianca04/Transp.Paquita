<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            ['nombre' => 'Bioseguridad', 'descripcion' => 'Área encargada de la protección sanitaria y prevención de riesgos.'],
            ['nombre' => 'Pintado', 'descripcion' => 'Área especializada en la aplicación de pintura y acabados.'],
            ['nombre' => 'Electricidad', 'descripcion' => 'Área responsable de instalaciones y mantenimiento eléctrico.'],
            ['nombre' => 'Mecánica', 'descripcion' => 'Área dedicada al diagnóstico y reparación mecánica.'],
            ['nombre' => 'Soldadura', 'descripcion' => 'Área que realiza trabajos de unión de materiales metálicos.'],
            ['nombre' => 'Lubricantes', 'descripcion' => 'Área que gestiona aceites, grasas y otros fluidos industriales.'],
            ['nombre' => 'Formatos', 'descripcion' => 'Área de documentos y formularios de control.'],
            ['nombre' => 'Inventario', 'descripcion' => 'Área de gestión y almacenamiento de materiales y productos.'],
        ];

        foreach ($areas as $area) {
            Area::updateOrCreate(
                ['nombre' => $area['nombre']],
                $area
            );
        }
    }
}
