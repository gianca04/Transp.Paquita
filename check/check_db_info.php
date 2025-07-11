<?php
require 'vendor/autoload.php';

$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

echo "=== VERIFICANDO BASE DE DATOS ===" . PHP_EOL;

try {
    $driver = DB::connection()->getDriverName();
    echo "Driver de base de datos: $driver" . PHP_EOL;
    
    if ($driver === 'sqlite') {
        // Para SQLite
        $result = DB::select("SELECT sql FROM sqlite_master WHERE type='table' AND name='productos'");
        if (!empty($result)) {
            echo "SQL de creación de tabla productos:" . PHP_EOL;
            echo $result[0]->sql . PHP_EOL;
        }
    }
    
    echo PHP_EOL . "=== VERIFICANDO CONSTRAINT VIOLATIONS ===" . PHP_EOL;
    echo "Foreign keys habilitadas: " . (DB::select("PRAGMA foreign_keys")[0]->foreign_keys ? 'SÍ' : 'NO') . PHP_EOL;
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
