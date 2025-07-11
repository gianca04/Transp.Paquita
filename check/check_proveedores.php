<?php
require 'vendor/autoload.php';

$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Proveedor;

echo "Proveedores existentes: " . Proveedor::count() . PHP_EOL;

foreach(Proveedor::all() as $proveedor) {
    echo $proveedor->id . " - " . $proveedor->nombre . " - " . $proveedor->email . PHP_EOL;
}
