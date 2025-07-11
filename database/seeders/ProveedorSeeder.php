<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proveedor;

class ProveedorSeeder extends Seeder
{
    public function run(): void
    {
        $proveedores = [
            [
                'nombre' => 'Proveedor General',
                'contacto' => 'Administración',
                'telefono' => '01-2345678',
                'email' => 'contacto@proveedorgeneral.com',
                'direccion' => 'Av. Principal 123, Lima, Perú',
                'ruc' => '20123456789',
                'descripcion' => 'Proveedor principal para suministros generales de la empresa.'
            ],
            [
                'nombre' => 'Distribuidora Automotriz SAC',
                'contacto' => 'Juan Pérez',
                'telefono' => '01-9876543',
                'email' => 'ventas@automotriz.com',
                'direccion' => 'Jr. Los Mecánicos 456, San Juan de Lurigancho',
                'ruc' => '20987654321',
                'descripcion' => 'Especialista en repuestos y accesorios automotrices.'
            ],
            [
                'nombre' => 'EPP Seguridad Industrial',
                'contacto' => 'María González',
                'telefono' => '01-5555555',
                'email' => 'info@eppseguridad.com',
                'direccion' => 'Av. Industrial 789, Ate',
                'ruc' => '20555555555',
                'descripcion' => 'Proveedor especializado en equipos de protección personal.'
            ]
        ];

        foreach ($proveedores as $proveedor) {
            Proveedor::updateOrCreate(
                ['email' => $proveedor['email']],
                $proveedor
            );
        }
    }
}
