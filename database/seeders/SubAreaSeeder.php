<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubArea;
use App\Models\Area;

class SubAreaSeeder extends Seeder
{
    public function run(): void
    {
        $subareas = [
            ['area' => 'Bioseguridad', 'nombre' => 'Almacén EPP', 'descripcion' => 'Almacenamiento de equipos de protección personal.'],
            ['area' => 'Bioseguridad', 'nombre' => 'Control Sanitario', 'descripcion' => 'Supervisión de medidas de bioseguridad.'],
            ['area' => 'Pintado', 'nombre' => 'Preparación de Superficies', 'descripcion' => 'Limpieza y acondicionamiento previo al pintado.'],
            ['area' => 'Pintado', 'nombre' => 'Aplicación de Pintura', 'descripcion' => 'Proceso de pintado y acabados.'],
            ['area' => 'Electricidad', 'nombre' => 'Tableros', 'descripcion' => 'Sección de controladores eléctricos.'],
            ['area' => 'Electricidad', 'nombre' => 'Instalaciones Eléctricas', 'descripcion' => 'Montaje y mantenimiento de sistemas eléctricos.'],
            ['area' => 'Mecánica', 'nombre' => 'Motores', 'descripcion' => 'Zona de diagnóstico y reparación de motores.'],
            ['area' => 'Mecánica', 'nombre' => 'Transmisiones', 'descripcion' => 'Revisión y reparación de sistemas de transmisión.'],
            ['area' => 'Soldadura', 'nombre' => 'Soldadura MIG', 'descripcion' => 'Soldadura con gas inerte metálico.'],
            ['area' => 'Soldadura', 'nombre' => 'Soldadura TIG', 'descripcion' => 'Soldadura con gas inerte de tungsteno.'],
            ['area' => 'Lubricantes', 'nombre' => 'Almacén de Lubricantes', 'descripcion' => 'Gestión de aceites y grasas industriales.'],
            ['area' => 'Lubricantes', 'nombre' => 'Control de Calidad', 'descripcion' => 'Verificación de estándares de lubricantes.'],
            ['area' => 'Formatos', 'nombre' => 'Gestión Documental', 'descripcion' => 'Organización y control de documentos.'],
            ['area' => 'Formatos', 'nombre' => 'Control de Formularios', 'descripcion' => 'Supervisión de formularios de control.'],
        ];

        foreach ($subareas as $subarea) {
            $area = Area::where('nombre', $subarea['area'])->first();
            if ($area) {
                SubArea::updateOrCreate(
                    [
                        'area_id' => $area->id,
                        'nombre' => $subarea['nombre']
                    ],
                    [
                        'area_id' => $area->id,
                        'nombre' => $subarea['nombre'],
                        'descripcion' => $subarea['descripcion'],
                    ]
                );
            }
        }
    }
}
