<?php
require 'vendor/autoload.php';

$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Proveedor;

// Actualizar el email del primer proveedor
$proveedor = Proveedor::find(1);
if ($proveedor) {
    $proveedor->email = 'contacto@proveedorgeneral.com';
    $proveedor->save();
    echo "Email del proveedor actualizado." . PHP_EOL;
}

echo "Proveedores actualizados:" . PHP_EOL;
foreach(Proveedor::all() as $p) {
    echo $p->id . " - " . $p->nombre . " - " . $p->email . PHP_EOL;
}
