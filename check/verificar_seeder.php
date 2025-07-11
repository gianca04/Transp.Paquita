<?php

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'sqlite',
    'database' => __DIR__ . '/database/database.sqlite',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

try {
    $productos = $capsule->table('productos')->count();
    $marcas = $capsule->table('marcas')->count();
    $categorias = $capsule->table('categorias')->count();
    $areas = $capsule->table('areas')->count();
    $subareas = $capsule->table('sub_areas')->count();
    $proveedores = $capsule->table('proveedores')->count();

    echo "=== RESUMEN DE SEEDERS ===" . PHP_EOL;
    echo "Total productos: " . $productos . PHP_EOL;
    echo "Total marcas: " . $marcas . PHP_EOL;
    echo "Total categorías: " . $categorias . PHP_EOL;
    echo "Total áreas: " . $areas . PHP_EOL;
    echo "Total sub-áreas: " . $subareas . PHP_EOL;
    echo "Total proveedores: " . $proveedores . PHP_EOL;
    echo PHP_EOL;

    // Mostrar algunos productos de ejemplo
    echo "=== PRODUCTOS DE EJEMPLO ===" . PHP_EOL;
    $productosEjemplo = $capsule->table('productos')
        ->join('areas', 'productos.area_id', '=', 'areas.id')
        ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
        ->leftJoin('marcas', 'productos.marca_id', '=', 'marcas.id')
        ->select('productos.nombre', 'areas.nombre as area', 'categorias.nombre as categoria', 'marcas.nombre as marca')
        ->limit(10)
        ->get();

    foreach ($productosEjemplo as $producto) {
        echo "- {$producto->nombre} (Área: {$producto->area}, Categoría: {$producto->categoria}, Marca: " . ($producto->marca ?? 'Sin marca') . ")" . PHP_EOL;
    }

    // Mostrar áreas con más productos
    echo PHP_EOL . "=== PRODUCTOS POR ÁREA ===" . PHP_EOL;
    $productosPorArea = $capsule->table('productos')
        ->join('areas', 'productos.area_id', '=', 'areas.id')
        ->selectRaw('areas.nombre, COUNT(*) as total')
        ->groupBy('areas.nombre')
        ->orderBy('total', 'desc')
        ->get();

    foreach ($productosPorArea as $area) {
        echo "- {$area->nombre}: {$area->total} productos" . PHP_EOL;
    }

    echo PHP_EOL . "✅ Seeders ejecutados correctamente!" . PHP_EOL;

} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . PHP_EOL;
}
