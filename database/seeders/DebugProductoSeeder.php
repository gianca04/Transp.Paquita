<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Area;
use App\Models\SubArea;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Stock;

class DebugProductoSeeder extends Seeder
{
    public function run(): void
    {
        // Solo los primeros 3 productos
        $productos = [
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'FARMAPRECIO', 'nombre' => 'Algodón Hidrófilo 100g', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'COPPON', 'nombre' => 'Algodón 500g', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'CORONA', 'nombre' => 'Algodón 25g', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
        ];

        foreach ($productos as $index => $item) {
            echo "=== Procesando producto " . ($index + 1) . ": {$item['nombre']} ===" . PHP_EOL;
            
            $area = Area::where('nombre', $item['area'])->first();
            $subArea = $item['sub'] ? SubArea::where('nombre', $item['sub'])->first() : null;
            $categoria = Categoria::where('nombre', $item['categoria'])->first();
            $marca = Marca::where('nombre', $item['marca'])->first();

            echo "- Área: " . ($area ? "{$area->nombre} (ID: {$area->id})" : "NO ENCONTRADA") . PHP_EOL;
            echo "- SubÁrea: " . ($subArea ? "{$subArea->nombre} (ID: {$subArea->id})" : ($item['sub'] ? "NO ENCONTRADA" : "null (correcto)")) . PHP_EOL;
            echo "- Categoría: " . ($categoria ? "{$categoria->nombre} (ID: {$categoria->id})" : "NO ENCONTRADA") . PHP_EOL;
            echo "- Marca: " . ($marca ? "{$marca->nombre} (ID: {$marca->id})" : "NO ENCONTRADA") . PHP_EOL;

            // Validar que existan todas las relaciones necesarias
            if (!$area) {
                echo "ERROR: Área '{$item['area']}' no encontrada" . PHP_EOL;
                return;
            }
            if (!$categoria) {
                echo "ERROR: Categoría '{$item['categoria']}' no encontrada" . PHP_EOL;
                return;
            }
            if (!$marca) {
                echo "ERROR: Marca '{$item['marca']}' no encontrada" . PHP_EOL;
                return;
            }

            echo "- Intentando crear producto..." . PHP_EOL;
            
            try {
                $producto = new Producto();
                $producto->area_id = $area->id;
                $producto->sub_area_id = $subArea?->id;
                $producto->categoria_id = $categoria->id;
                $producto->marca_id = $marca->id;
                $producto->proveedor_id = 1;
                $producto->user_id = 1;
                $producto->nombre = $item['nombre'];
                $producto->descripcion = $item['descripcion'];
                $producto->foto = null;
                
                echo "- Datos a guardar:" . PHP_EOL;
                echo "  * area_id: {$producto->area_id}" . PHP_EOL;
                echo "  * sub_area_id: " . ($producto->sub_area_id ?: 'null') . PHP_EOL;
                echo "  * categoria_id: {$producto->categoria_id}" . PHP_EOL;
                echo "  * marca_id: {$producto->marca_id}" . PHP_EOL;
                echo "  * proveedor_id: {$producto->proveedor_id}" . PHP_EOL;
                echo "  * user_id: {$producto->user_id}" . PHP_EOL;
                echo "  * nombre: {$producto->nombre}" . PHP_EOL;
                
                $producto->save();
                
                echo "✓ Producto creado exitosamente (ID: {$producto->id})" . PHP_EOL;
                
                // Crear stock
                $stock = new Stock();
                $stock->producto_id = $producto->id;
                $stock->medida = 'unidad';
                $stock->cantidad = 5;
                $stock->minimo = 1;
                $stock->maximo = 10;
                $stock->save();
                
                echo "✓ Stock creado para producto {$producto->id}" . PHP_EOL;
                
            } catch (\Exception $e) {
                echo "✗ ERROR al crear producto: " . $e->getMessage() . PHP_EOL;
                echo "Archivo: " . $e->getFile() . ":" . $e->getLine() . PHP_EOL;
                return;
            }
            
            echo PHP_EOL;
        }
        
        echo "DebugProductoSeeder completado exitosamente." . PHP_EOL;
    }
}
