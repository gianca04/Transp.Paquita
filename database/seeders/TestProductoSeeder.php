<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Area;
use App\Models\SubArea;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Stock;

class TestProductoSeeder extends Seeder
{
    public function run(): void
    {
        echo "Iniciando TestProductoSeeder..." . PHP_EOL;
        
        $productos = [
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'FARMAPRECIO', 'nombre' => 'Algodón Hidrófilo 100g TEST', 'descripcion' => 'Producto de prueba', 'proveedor_id' => 1, 'user_id' => 1],
        ];

        foreach ($productos as $item) {
            echo "Procesando: {$item['nombre']}" . PHP_EOL;
            
            $area = Area::where('nombre', $item['area'])->first();
            $subArea = $item['sub'] ? SubArea::where('nombre', $item['sub'])->first() : null;
            $categoria = Categoria::where('nombre', $item['categoria'])->first();
            $marca = Marca::where('nombre', $item['marca'])->first();

            if (!$area || !$categoria || !$marca) {
                echo "Error: Faltan relaciones necesarias" . PHP_EOL;
                continue;
            }

            echo "Creando producto..." . PHP_EOL;
            
            $producto = Producto::create([
                'area_id'       => $area->id,
                'sub_area_id'   => $subArea?->id,
                'categoria_id'  => $categoria->id,
                'marca_id'      => $marca->id,
                'proveedor_id'  => 1,
                'user_id'       => 1,
                'nombre'        => $item['nombre'],
                'descripcion'   => $item['descripcion'],
                'foto'          => null,
            ]);

            echo "✓ Producto creado con ID: {$producto->id}" . PHP_EOL;

            // Crear stock
            Stock::create([
                'producto_id' => $producto->id,
                'medida' => 'unidad',
                'cantidad' => 5,
                'minimo' => 1,
                'maximo' => 10,
            ]);

            echo "✓ Stock creado para producto {$producto->id}" . PHP_EOL;
        }
        
        echo "TestProductoSeeder completado." . PHP_EOL;
    }
}
