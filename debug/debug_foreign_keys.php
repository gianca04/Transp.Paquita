<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use App\Models\Proveedor;

echo "=== VERIFICACIÓN DE CLAVES FORÁNEAS ===" . PHP_EOL;

$users = User::count();
echo "Total usuarios: {$users}" . PHP_EOL;

if ($users > 0) {
    $firstUser = User::first();
    echo "Primer usuario ID: {$firstUser->id}, Email: {$firstUser->email}" . PHP_EOL;
}

$proveedores = Proveedor::count();
echo "Total proveedores: {$proveedores}" . PHP_EOL;

if ($proveedores > 0) {
    $firstProveedor = Proveedor::first();
    echo "Primer proveedor ID: {$firstProveedor->id}, Nombre: {$firstProveedor->nombre}" . PHP_EOL;
}
