<?php
require 'vendor/autoload.php';

$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;

echo "Total de usuarios: " . User::count() . PHP_EOL;

if (User::count() > 0) {
    $user = User::first();
    echo "Primer usuario ID: " . $user->id . " - " . $user->name . PHP_EOL;
} else {
    echo "No hay usuarios en la base de datos" . PHP_EOL;
}
