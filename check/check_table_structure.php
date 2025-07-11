<?php
require 'vendor/autoload.php';

$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

echo "=== ESTRUCTURA DE LA TABLA PRODUCTOS ===" . PHP_EOL;

// Obtener información de las columnas
$sql = "PRAGMA table_info(productos)";
$columns = DB::select($sql);

foreach ($columns as $column) {
    $nullable = $column->notnull == 0 ? 'NULL' : 'NOT NULL';
    $default = $column->dflt_value ? " DEFAULT {$column->dflt_value}" : '';
    echo "- {$column->name}: {$column->type} {$nullable}{$default}" . PHP_EOL;
}

echo PHP_EOL . "=== FOREIGN KEYS ===" . PHP_EOL;
$foreignKeys = DB::select("PRAGMA foreign_key_list(productos)");
foreach ($foreignKeys as $fk) {
    echo "- {$fk->from} -> {$fk->table}.{$fk->to}" . PHP_EOL;
}
