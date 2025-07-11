<?php
require 'vendor/autoload.php';

$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\{Area, SubArea, Categoria, Marca, Producto};

// Primer producto del seeder
$item = [
    'area' => 'Bioseguridad', 
    'sub' => 'Almacén EPP', 
    'categoria' => 'Consumibles', 
    'marca' => 'FARMAPRECIO', 
    'nombre' => 'Algodón Hidrófilo 100g', 
    'descripcion' => '', 
    'proveedor_id' => 1, 
    'user_id' => 1
];

echo "=== VERIFICANDO PRIMER PRODUCTO ===" . PHP_EOL;
echo "Nombre: {$item['nombre']}" . PHP_EOL;

$area = Area::where('nombre', $item['area'])->first();
$subArea = $item['sub'] ? SubArea::where('nombre', $item['sub'])->first() : null;
$categoria = Categoria::where('nombre', $item['categoria'])->first();
$marca = Marca::where('nombre', $item['marca'])->first();

echo "Área: " . ($area ? "✓ {$area->nombre} (ID: {$area->id})" : "✗ NO ENCONTRADA") . PHP_EOL;
echo "SubÁrea: " . ($subArea ? "✓ {$subArea->nombre} (ID: {$subArea->id})" : "✗ NO ENCONTRADA") . PHP_EOL;
echo "Categoría: " . ($categoria ? "✓ {$categoria->nombre} (ID: {$categoria->id})" : "✗ NO ENCONTRADA") . PHP_EOL;
echo "Marca: " . ($marca ? "✓ {$marca->nombre} (ID: {$marca->id})" : "✗ NO ENCONTRADA") . PHP_EOL;

if (!$area || !$categoria || !$marca) {
    echo PHP_EOL . "ERROR: Faltan relaciones necesarias" . PHP_EOL;
} else {
    echo PHP_EOL . "✓ Todas las relaciones existen" . PHP_EOL;
    
    try {
        $producto = Producto::updateOrCreate(
            [
                'nombre' => $item['nombre'],
                'area_id' => $area->id,
            ],
            [
                'area_id'       => $area->id,
                'sub_area_id'   => $subArea?->id,
                'categoria_id'  => $categoria->id,
                'marca_id'      => $marca->id,
                'proveedor_id'  => 1,
                'user_id'       => 1,
                'nombre'        => $item['nombre'],
                'descripcion'   => $item['descripcion'],
                'foto'          => null,
            ]
        );
        echo "✓ Producto creado/actualizado exitosamente (ID: {$producto->id})" . PHP_EOL;
    } catch (Exception $e) {
        echo "✗ Error al crear producto: " . $e->getMessage() . PHP_EOL;
    }
}
