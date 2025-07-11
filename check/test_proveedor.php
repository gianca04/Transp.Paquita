<?php
require 'vendor/autoload.php';

$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Proveedor;

echo "Intentando crear un proveedor de prueba..." . PHP_EOL;

try {
    $proveedor = Proveedor::updateOrCreate(
        ['email' => 'test@test.com'],
        [
            'nombre' => 'Test Proveedor',
            'contacto' => 'Test Contacto',
            'telefono' => '123456789',
            'email' => 'test@test.com',
            'direccion' => 'Test Direccion',
            'ruc' => '12345678901',
            'descripcion' => 'Test descripcion'
        ]
    );
    echo "Proveedor creado exitosamente: " . $proveedor->id . PHP_EOL;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
    echo "Línea: " . $e->getLine() . PHP_EOL;
    echo "Archivo: " . $e->getFile() . PHP_EOL;
}
