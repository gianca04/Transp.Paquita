<?php

// database/seeders/MarcaSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Marca;

class MarcaSeeder extends Seeder
{
    public function run(): void
    {
        $marcas = [
            [
                'nombre' => 'FARMAPRECIO',
                'descripcion' => 'Marca farmacéutica peruana que ofrece insumos médicos y productos de botiquín a bajo costo.'
            ],
            [
                'nombre' => 'COPPON',
                'descripcion' => 'Marca especializada en productos de algodón y materiales médicos descartables.'
            ],
            [
                'nombre' => 'CORONA',
                'descripcion' => 'Fabricante nacional de productos médicos como algodón, gasas y productos para curación.'
            ],
            [
                'nombre' => 'INKADRAP',
                'descripcion' => 'Marca peruana de esparadrapos, cintas médicas y materiales de fijación.'
            ],
            [
                'nombre' => 'BENDIC',
                'descripcion' => 'Empresa enfocada en la producción de insumos médicos, como cintas adhesivas y vendajes.'
            ],
            [
                'nombre' => 'ECO MAX',
                'descripcion' => 'Proveedor de guantes de látex y productos descartables para bioseguridad.'
            ],
            [
                'nombre' => 'PAQUITA',
                'descripcion' => 'Nombre de la empresa de transportes utilizada para los formatos de operación y logística.'
            ],
            [
                'nombre' => 'VISTONY',
                'descripcion' => 'Empresa peruana líder en lubricantes, aditivos, productos de limpieza automotriz y refrigerantes.'
            ],
            [
                'nombre' => 'HELLA',
                'descripcion' => 'Marca alemana reconocida por su tecnología en iluminación y electrónica automotriz.'
            ],
            [
                'nombre' => 'NORTON',
                'descripcion' => 'Marca internacional que fabrica abrasivos industriales, discos de corte y desbaste.'
            ],
            [
                'nombre' => 'WURTH',
                'descripcion' => 'Empresa alemana líder mundial en materiales de montaje, fijación, herramientas y químicos industriales.'
            ],
            [
                'nombre' => 'STANLEY',
                'descripcion' => 'Marca estadounidense de herramientas y productos para construcción, reparación y mantenimiento.'
            ],
        ];

        foreach ($marcas as $marca) {
            Marca::create([
                'nombre' => $marca['nombre'],
                'descripcion' => $marca['descripcion'],
            ]);
        }
    }
}
