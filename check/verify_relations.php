<?php
require 'vendor/autoload.php';

$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\{Area, Categoria, Marca, Producto};

// Verificar algunas marcas del ProductoSeeder
$testMarcas = ['FARMAPRECIO', 'BRIDGESTONE', 'TECHKING', 'S/M', 'UNKNOWN_MARCA'];

echo "=== VERIFICACIÓN DE MARCAS ===" . PHP_EOL;
foreach ($testMarcas as $nombre) {
    $marca = Marca::where('nombre', $nombre)->first();
    if ($marca) {
        echo "✓ Marca '{$nombre}' existe (ID: {$marca->id})" . PHP_EOL;
    } else {
        echo "✗ Marca '{$nombre}' NO existe" . PHP_EOL;
    }
}

$testCategorias = ['Herramientas', 'Equipos de protección', 'Consumibles', 'CATEGORIA_INEXISTENTE'];

echo PHP_EOL . "=== VERIFICACIÓN DE CATEGORÍAS ===" . PHP_EOL;
foreach ($testCategorias as $nombre) {
    $categoria = Categoria::where('nombre', $nombre)->first();
    if ($categoria) {
        echo "✓ Categoría '{$nombre}' existe (ID: {$categoria->id})" . PHP_EOL;
    } else {
        echo "✗ Categoría '{$nombre}' NO existe" . PHP_EOL;
    }
}

$testAreas = ['Bioseguridad', 'Pintado', 'Inventario', 'AREA_INEXISTENTE'];

echo PHP_EOL . "=== VERIFICACIÓN DE ÁREAS ===" . PHP_EOL;
foreach ($testAreas as $nombre) {
    $area = Area::where('nombre', $nombre)->first();
    if ($area) {
        echo "✓ Área '{$nombre}' existe (ID: {$area->id})" . PHP_EOL;
    } else {
        echo "✗ Área '{$nombre}' NO existe" . PHP_EOL;
    }
}

echo PHP_EOL . "Total de marcas: " . Marca::count() . PHP_EOL;
echo "Total de categorías: " . Categoria::count() . PHP_EOL;
echo "Total de áreas: " . Area::count() . PHP_EOL;
