<?php
require 'vendor/autoload.php';

$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\{Producto, Stock};

echo "=== INFORMACIÓN ACTUAL DE PRODUCTOS ===" . PHP_EOL;
echo "Total de productos: " . Producto::count() . PHP_EOL;
echo "Total de stocks: " . Stock::count() . PHP_EOL;

if (Producto::count() > 0) {
    echo PHP_EOL . "=== ÚLTIMOS 5 PRODUCTOS ===" . PHP_EOL;
    $productos = Producto::latest()->take(5)->get();
    foreach ($productos as $producto) {
        echo "ID: {$producto->id} - {$producto->nombre} (Área: {$producto->area_id})" . PHP_EOL;
    }
    
    // Intentar eliminar el último producto para hacer espacio
    $ultimo = Producto::latest()->first();
    echo PHP_EOL . "Eliminando último producto: {$ultimo->nombre}..." . PHP_EOL;
    $ultimo->delete();
    echo "✓ Producto eliminado" . PHP_EOL;
}
