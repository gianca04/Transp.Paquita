<?php
require 'vendor/autoload.php';

$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\{Area, SubArea, Categoria, Marca, Producto, User, Proveedor};

echo "=== VERIFICANDO TODAS LAS RELACIONES ===" . PHP_EOL;

$area = Area::find(1);
$categoria = Categoria::find(1);
$marca = Marca::find(26); // Usar el primer ID válido
$user = User::find(1);
$proveedor = Proveedor::find(1);

echo "Área: " . ($area ? "✓ {$area->id} - {$area->nombre}" : "✗ No existe") . PHP_EOL;
echo "Categoría: " . ($categoria ? "✓ {$categoria->id} - {$categoria->nombre}" : "✗ No existe") . PHP_EOL;
echo "Marca: " . ($marca ? "✓ {$marca->id} - {$marca->nombre}" : "✗ No existe") . PHP_EOL;
echo "Usuario: " . ($user ? "✓ {$user->id} - {$user->name}" : "✗ No existe") . PHP_EOL;
echo "Proveedor: " . ($proveedor ? "✓ {$proveedor->id} - {$proveedor->nombre}" : "✗ No existe") . PHP_EOL;

if ($area && $categoria && $marca && $user && $proveedor) {
    echo PHP_EOL . "Intentando crear producto..." . PHP_EOL;
    
    try {
        $producto = new Producto();
        $producto->area_id = $area->id;
        $producto->sub_area_id = null; // Explícitamente null
        $producto->categoria_id = $categoria->id;
        $producto->marca_id = $marca->id;
        $producto->proveedor_id = $proveedor->id;
        $producto->user_id = $user->id;
        $producto->nombre = 'Producto de Prueba';
        $producto->descripcion = 'Descripción de prueba';
        $producto->foto = null;
        
        $producto->save();
        
        echo "✓ Producto creado exitosamente (ID: {$producto->id})" . PHP_EOL;
    } catch (Exception $e) {
        echo "✗ Error: " . $e->getMessage() . PHP_EOL;
        echo "Archivo: " . $e->getFile() . ":" . $e->getLine() . PHP_EOL;
    }
} else {
    echo PHP_EOL . "✗ Faltan relaciones necesarias" . PHP_EOL;
}
