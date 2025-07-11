<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Producto;
use App\Models\Area;
use App\Models\SubArea;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Stock;

// Datos de ejemplo para probar
$productos = [
    ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'FARMAPRECIO', 'nombre' => 'Algodón Hidrófilo 100g - Test', 'descripcion' => 'Producto de prueba', 'proveedor_id' => 1, 'user_id' => 1],
];

echo "=== DEBUG PRODUCTO SEEDER ===" . PHP_EOL;

foreach ($productos as $item) {
    echo "Procesando producto: {$item['nombre']}" . PHP_EOL;
    
    // Verificar área
    $area = Area::where('nombre', $item['area'])->first();
    echo "Área encontrada: " . ($area ? $area->nombre : "NO ENCONTRADA") . PHP_EOL;
    
    // Verificar subárea
    $subArea = $item['sub'] ? SubArea::where('nombre', $item['sub'])->first() : null;
    echo "SubÁrea encontrada: " . ($subArea ? $subArea->nombre : "NO ENCONTRADA/NULL") . PHP_EOL;
    
    // Verificar/crear categoría
    $categoria = Categoria::updateOrCreate(
        ['nombre' => $item['categoria']],
        [
            'nombre' => $item['categoria'],
            'descripcion' => 'Categoría creada automáticamente desde el seeder de productos.'
        ]
    );
    echo "Categoría: {$categoria->nombre} (ID: {$categoria->id})" . PHP_EOL;
    
    // Verificar/crear marca
    $marca = null;
    if ($item['marca']) {
        $marca = Marca::updateOrCreate(
            ['nombre' => $item['marca']],
            [
                'nombre' => $item['marca'],
                'descripcion' => 'Marca creada automáticamente desde el seeder de productos.'
            ]
        );
        echo "Marca: {$marca->nombre} (ID: {$marca->id})" . PHP_EOL;
    }

    if (!$area) {
        echo "❌ Error: Área no encontrada" . PHP_EOL;
        continue;
    }

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
                'marca_id'      => $marca?->id,
                'proveedor_id'  => 1,
                'user_id'       => 1,
                'nombre'        => $item['nombre'],
                'descripcion'   => $item['descripcion'],
                'foto'          => null,
            ]
        );
        
        echo "✅ Producto creado: {$producto->nombre} (ID: {$producto->id})" . PHP_EOL;
        
        // Crear stock
        $stockData = ['medida' => 'unidad', 'cantidad' => 5];
        
        $stock = Stock::updateOrCreate(
            ['producto_id' => $producto->id],
            [
                'producto_id' => $producto->id,
                'medida' => $stockData['medida'],
                'cantidad' => $stockData['cantidad'],
                'minimo' => 1,
                'maximo' => $stockData['cantidad'] + 5,
            ]
        );
        
        echo "✅ Stock creado para producto (Cantidad: {$stock->cantidad})" . PHP_EOL;
        
    } catch (Exception $e) {
        echo "❌ Error creando producto: " . $e->getMessage() . PHP_EOL;
        echo "Stack trace: " . $e->getTraceAsString() . PHP_EOL;
    }
    
    echo "-------------------------" . PHP_EOL;
}

echo "Total productos en BD: " . Producto::count() . PHP_EOL;
