<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProveedorSeeder::class,
            MarcaSeeder::class,
            CategoriaSeeder::class,
            AreaSeeder::class,
            SubAreaSeeder::class,
            ProductoSeeder::class,
        ]);
    }
}
