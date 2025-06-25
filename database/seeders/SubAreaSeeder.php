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
            ['area' => 'Electricidad', 'nombre' => 'Tableros', 'descripcion' => 'Sección de controladores eléctricos.'],
            ['area' => 'Mecánica', 'nombre' => 'Motores', 'descripcion' => 'Zona de diagnóstico y reparación de motores.'],
        ];

        foreach ($subareas as $subarea) {
            $area = Area::where('nombre', $subarea['area'])->first();
            if ($area) {
                SubArea::create([
                    'area_id' => $area->id,
                    'nombre' => $subarea['nombre'],
                    'descripcion' => $subarea['descripcion'],
                ]);
            }
        }
    }
}
