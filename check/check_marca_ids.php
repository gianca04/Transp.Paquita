<?php
require 'vendor/autoload.php';

$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Marca;

echo "=== PRIMERAS 10 MARCAS ===" . PHP_EOL;
$marcas = Marca::take(10)->get();
foreach ($marcas as $marca) {
    echo "ID: {$marca->id} - Nombre: {$marca->nombre}" . PHP_EOL;
}

echo PHP_EOL . "Total de marcas: " . Marca::count() . PHP_EOL;
echo "Menor ID: " . Marca::min('id') . PHP_EOL;
echo "Mayor ID: " . Marca::max('id') . PHP_EOL;
