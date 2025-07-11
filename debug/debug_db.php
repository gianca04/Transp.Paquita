<?php
require 'vendor/autoload.php';

$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

echo "=== VERIFICANDO ESTRUCTURA DE LA BASE DE DATOS ===" . PHP_EOL;

// Verificar que las tablas existan
$tables = ['areas', 'sub_areas', 'categorias', 'marcas', 'proveedores', 'users', 'productos'];

foreach ($tables as $table) {
    try {
        $count = DB::table($table)->count();
        echo "✓ Tabla '$table' existe con $count registros" . PHP_EOL;
    } catch (Exception $e) {
        echo "✗ Tabla '$table' NO existe o error: " . $e->getMessage() . PHP_EOL;
    }
}

echo PHP_EOL . "=== INTENTANDO INSERCIÓN DIRECTA ===" . PHP_EOL;

try {
    $productoId = DB::table('productos')->insertGetId([
        'area_id' => 1,
        'sub_area_id' => null,
        'categoria_id' => 3,
        'marca_id' => 73,
        'proveedor_id' => 1,
        'user_id' => 1,
        'nombre' => 'Producto de Prueba Directo',
        'descripcion' => 'Descripción de prueba',
        'foto' => null,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    
    echo "✓ Producto insertado directamente con ID: $productoId" . PHP_EOL;
} catch (Exception $e) {
    echo "✗ Error en inserción directa: " . $e->getMessage() . PHP_EOL;
    echo "Tipo de error: " . get_class($e) . PHP_EOL;
}
