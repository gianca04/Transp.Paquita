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
                'nombre' => 'BRIDGESTONE',
                'descripcion' => 'Fabricante líder de neumáticos y productos de caucho a nivel mundial.'
            ],
            [
                'nombre' => 'TECHKING',
                'descripcion' => 'Marca especializada en neumáticos para maquinaria pesada y vehículos industriales.'
            ],
            [
                'nombre' => 'GOODYEAR',
                'descripcion' => 'Reconocida marca de neumáticos con presencia global y productos innovadores.'
            ],
            [
                'nombre' => 'APOLLO',
                'descripcion' => 'Fabricante de neumáticos con enfoque en calidad y sostenibilidad.'
            ],
            [
                'nombre' => 'S/M',
                'descripcion' => 'Marca genérica utilizada para productos sin marca específica.'
            ],
            [
                'nombre' => 'CENTER',
                'descripcion' => 'Marca dedicada a la distribución de productos automotrices.'
            ],
            [
                'nombre' => 'EUROPEO',
                'descripcion' => 'Marca que representa calidad y diseño europeo en sus productos.'
            ],
            [
                'nombre' => 'DUNLOP',
                'descripcion' => 'Marca de neumáticos conocida por su innovación y rendimiento.'
            ],
            [
                'nombre' => 'DOUBLE HAPPINESS',
                'descripcion' => 'Marca asiática que ofrece productos de alta calidad y accesibles.'
            ],
            [
                'nombre' => 'AEDWS',
                'descripcion' => 'Fabricante de productos automotrices con enfoque en tecnología avanzada.'
            ],
            [
                'nombre' => 'NEXEN',
                'descripcion' => 'Marca de neumáticos con una amplia gama de productos para diferentes vehículos.'
            ],
            [
                'nombre' => 'VOLVO',
                'descripcion' => 'Reconocida marca de vehículos y productos automotrices de alta calidad.'
            ],
            [
                'nombre' => 'COPPON',
                'descripcion' => 'Marca especializada en productos de ferretería y construcción.'
            ],
            [
                'nombre' => 'CORONA',
                'descripcion' => 'Marca líder en productos cerámicos y de construcción.'
            ],
            [
                'nombre' => 'INKADRAP',
                'descripcion' => 'Marca peruana dedicada a la fabricación de productos industriales.'
            ],
            [
                'nombre' => 'BENDIC',
                'descripcion' => 'Marca enfocada en productos de seguridad industrial.'
            ],
            [
                'nombre' => 'ECO MAX',
                'descripcion' => 'Marca que ofrece productos ecológicos y sostenibles.'
            ],
            [
                'nombre' => 'TOP MEDIC',
                'descripcion' => 'Marca especializada en insumos médicos y hospitalarios.'
            ],
            [
                'nombre' => 'ALKHOFARMA',
                'descripcion' => 'Fabricante de productos farmacéuticos y de salud.'
            ],
            [
                'nombre' => 'D Y R',
                'descripcion' => 'Marca dedicada a la distribución de productos industriales y de construcción.'
            ],
            [
                'nombre' => 'MEDIFARMA',
                'descripcion' => 'Marca peruana líder en productos farmacéuticos y de salud.'
            ],
            [
                'nombre' => 'MAMELUCO',
                'descripcion' => 'Marca especializada en ropa de trabajo y seguridad industrial.'
            ],
            [
                'nombre' => 'STEEL PRO',
                'descripcion' => 'Marca reconocida en productos de seguridad industrial y protección personal.'
            ],
            [
                'nombre' => 'MASTHERS',
                'descripcion' => 'Marca dedicada a herramientas y productos de ferretería.'
            ],
            [
                'nombre' => 'SPY',
                'descripcion' => 'Marca especializada en productos ópticos y de seguridad.'
            ],
            [
                'nombre' => 'PERU',
                'descripcion' => 'Marca genérica que representa productos nacionales.'
            ],
            [
                'nombre' => '3M',
                'descripcion' => 'Marca global conocida por su innovación en productos industriales y de consumo.'
            ],
            [
                'nombre' => 'SMITH',
                'descripcion' => 'Marca especializada en productos ópticos y de protección.'
            ],
            [
                'nombre' => 'PHARMA',
                'descripcion' => 'Marca dedicada a la fabricación de productos farmacéuticos.'
            ],
            [
                'nombre' => 'MEDICAL',
                'descripcion' => 'Marca enfocada en insumos médicos y hospitalarios.'
            ],
            [
                'nombre' => 'BLACK SMITH',
                'descripcion' => 'Marca especializada en herramientas y productos de metalurgia.'
            ],
            [
                'nombre' => 'STANLEY',
                'descripcion' => 'Marca líder en herramientas y productos para la construcción, industria y reparación.'
            ],
            [
                'nombre' => 'ALKHOFAR',
                'descripcion' => 'Marca especializada en productos farmacéuticos y de salud.'
            ],
            [
                'nombre' => 'GENESIS',
                'descripcion' => 'Marca de productos industriales y de seguridad.'
            ],
            [
                'nombre' => 'PAQUITA',
                'descripcion' => 'Marca propia de la empresa para documentos y formatos.'
            ],
            [
                'nombre' => 'OIG',
                'descripcion' => 'Organización para documentos especializados.'
            ],
            [
                'nombre' => 'VISTONY',
                'descripcion' => 'Marca líder en lubricantes y productos automotrices en Perú.'
            ],
            [
                'nombre' => 'HELLA',
                'descripcion' => 'Marca alemana especializada en componentes eléctricos automotrices.'
            ],
            [
                'nombre' => 'NORTON',
                'descripcion' => 'Marca reconocida en discos abrasivos y herramientas de corte.'
            ],
            [
                'nombre' => 'WURTH',
                'descripcion' => 'Empresa alemana líder en productos de fijación y herramientas.'
            ],
            [
                'nombre' => 'MICHELIN',
                'descripcion' => 'Marca francesa líder mundial en neumáticos.'
            ],
            [
                'nombre' => 'GOOD YEAR',
                'descripcion' => 'Marca americana de neumáticos con presencia global.'
            ],
            [
                'nombre' => 'CHEMISA',
                'descripcion' => 'Marca especializada en productos químicos y pinturas.'
            ],
            [
                'nombre' => 'THONEER L COLOR',
                'descripcion' => 'Marca de pinturas y acabados.'
            ],
            [
                'nombre' => 'TORO',
                'descripcion' => 'Marca de herramientas y accesorios para pintura.'
            ],
            [
                'nombre' => 'PURISIMA',
                'descripcion' => 'Marca de productos químicos y de limpieza.'
            ],
            [
                'nombre' => 'LIQUIMOLY',
                'descripcion' => 'Marca alemana de aditivos y lubricantes automotrices.'
            ],
            [
                'nombre' => 'SARVI',
                'descripcion' => 'Marca de productos automotrices y químicos.'
            ],
            [
                'nombre' => 'CII',
                'descripcion' => 'Marca de lubricantes industriales.'
            ],
            [
                'nombre' => 'SHELL HELIZ',
                'descripcion' => 'Línea de lubricantes de la marca Shell.'
            ],
            [
                'nombre' => 'TEKNO',
                'descripcion' => 'Marca de productos químicos especializados.'
            ],
            [
                'nombre' => 'VISTONY ATF',
                'descripcion' => 'Línea especializada de fluidos de transmisión automática de Vistony.'
            ],
            [
                'nombre' => 'QUITAFACIL',
                'descripcion' => 'Marca de productos de limpieza industrial.'
            ],
            [
                'nombre' => 'DIAMANTE',
                'descripcion' => 'Marca de productos químicos de limpieza.'
            ],
            [
                'nombre' => 'CASTROL CRB',
                'descripcion' => 'Línea de lubricantes comerciales de Castrol.'
            ],
            [
                'nombre' => 'NARVA',
                'descripcion' => 'Marca alemana especializada en iluminación automotriz.'
            ],
            [
                'nombre' => 'TRUCK LAMP',
                'descripcion' => 'Marca especializada en iluminación para vehículos pesados.'
            ],
            [
                'nombre' => 'GPC',
                'descripcion' => 'Marca de componentes eléctricos automotrices.'
            ],
            [
                'nombre' => 'MKL',
                'descripcion' => 'Marca de conectores y cables eléctricos.'
            ],
            [
                'nombre' => 'SAP',
                'descripcion' => 'Marca de componentes eléctricos.'
            ],
            [
                'nombre' => 'BTICINO',
                'descripcion' => 'Marca italiana de componentes eléctricos y domóticos.'
            ],
            [
                'nombre' => 'PHILIPS',
                'descripcion' => 'Marca holandesa de tecnología e iluminación.'
            ],
            [
                'nombre' => 'UBERMAN',
                'descripcion' => 'Marca de herramientas y discos especializados.'
            ],
            [
                'nombre' => 'NAZCA',
                'descripcion' => 'Marca peruana de electrodos para soldadura.'
            ],
            [
                'nombre' => 'PRETUL',
                'descripcion' => 'Marca mexicana de herramientas.'
            ],
            [
                'nombre' => 'KWB',
                'descripcion' => 'Marca alemana de brocas y herramientas de corte.'
            ],
            [
                'nombre' => 'SKF',
                'descripcion' => 'Marca sueca líder mundial en rodamientos y cojinetes.'
            ],
            [
                'nombre' => 'INCCO',
                'descripcion' => 'Marca de herramientas neumáticas e hidráulicas.'
            ],
            [
                'nombre' => 'SAMAKAMA',
                'descripcion' => 'Marca de filtros automotrices.'
            ],
        ];

        foreach ($marcas as $marca) {
            Marca::updateOrCreate(
                ['nombre' => $marca['nombre']],
                $marca
            );
        }
    }
}
