<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Area;
use App\Models\SubArea;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Stock;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $productos = [
            // Bioseguridad
            // Bioseguridad
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'FARMAPRECIO', 'nombre' => 'Algodón Hidrófilo 100g', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'COPPON', 'nombre' => 'Algodón 500g', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'CORONA', 'nombre' => 'Algodón 25g', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'INKADRAP', 'nombre' => 'Esparadrapo 1.5mm x 1.8mt', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'BENDIC', 'nombre' => 'Esparadrapo 2.5mm x 5y', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Equipos de protección', 'marca' => 'ECO MAX', 'nombre' => 'Guantes de Látex Talla L', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            // Formatos
            ['area' => 'Formatos', 'sub' => null, 'categoria' => 'Documentos', 'marca' => 'PAQUITA', 'nombre' => 'Formato de Operación Transportes', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Formatos', 'sub' => null, 'categoria' => 'Documentos', 'marca' => 'PAQUITA', 'nombre' => 'Orden de Servicio para Transporte', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Formatos', 'sub' => null, 'categoria' => 'Documentos', 'marca' => 'PAQUITA', 'nombre' => 'Guía de Remisión Remitente', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Formatos', 'sub' => null, 'categoria' => 'Documentos', 'marca' => 'PAQUITA', 'nombre' => 'Guía de Remisión Transportista', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Formatos', 'sub' => null, 'categoria' => 'Documentos', 'marca' => 'PAQUITA', 'nombre' => 'Nota de Crédito', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Formatos', 'sub' => null, 'categoria' => 'Documentos', 'marca' => 'PAQUITA', 'nombre' => 'Vales de Combustible', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            // Pintado
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'VISTONY', 'nombre' => 'Limpiaparabrisas 1 Litro', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'VISTONY', 'nombre' => 'Agua para Baterías 1.1L', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'VISTONY', 'nombre' => 'Forza Plus Azul 15W/40 1/4GL', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'VISTONY', 'nombre' => 'Aditivo Diesel 300ml', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'VISTONY', 'nombre' => 'Aceite Transmec Dual 75W-90', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            // Electricidad
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'HELLA', 'nombre' => 'Alarma de Retroceso', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'HELLA', 'nombre' => 'Fusible Uña Verde 32V', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'HELLA', 'nombre' => 'Fusible Uña Marrón 32V', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'HELLA', 'nombre' => 'Fusible Uña Amarillo 32V', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'HELLA', 'nombre' => 'Fusible Uña Blanco 32V', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'HELLA', 'nombre' => 'Fusible Uña Rojo 32V', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            // Soldadura
            ['area' => 'Soldadura', 'sub' => null, 'categoria' => 'Herramientas', 'marca' => 'NORTON', 'nombre' => 'Disco de Corte 115x1x22.23mm', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Soldadura', 'sub' => null, 'categoria' => 'Herramientas', 'marca' => 'WURTH', 'nombre' => 'Disco de Desbaste 115x6x22.23mm', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Soldadura', 'sub' => null, 'categoria' => 'Herramientas', 'marca' => 'WURTH', 'nombre' => 'Disco Corte Acero Inox 230x1.9x22.23mm', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Soldadura', 'sub' => null, 'categoria' => 'Herramientas', 'marca' => 'STANLEY', 'nombre' => 'Disco Desbaste 115x6x22.23mm', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Soldadura', 'sub' => null, 'categoria' => 'Herramientas', 'marca' => 'WURTH', 'nombre' => 'Disco Desbaste 230x6x22.23mm', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Soldadura', 'sub' => null, 'categoria' => 'Herramientas', 'marca' => 'STANLEY', 'nombre' => 'Disco Desbaste 180x6x22mm', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            // Mecánica
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => 'STANLEY', 'nombre' => 'Pernos 3/8 x 4"', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => 'STANLEY', 'nombre' => 'Pernos 1/2 x 4"', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => 'STANLEY', 'nombre' => 'Autorroscante 1/4 x 5"', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => 'STANLEY', 'nombre' => 'Pernos 3/8 x 2"', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => 'STANLEY', 'nombre' => 'Pernos 9/16" (kg)', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
        ];

        foreach ($productos as $item) {
            $area = Area::where('nombre', $item['area'])->first();
            $subArea = $item['sub'] ? SubArea::where('nombre', $item['sub'])->first() : null;
            $categoria = Categoria::where('nombre', $item['categoria'])->first();
            $marca = Marca::where('nombre', $item['marca'])->first();

            $producto = Producto::create([
                'area_id'       => $area->id,
                'sub_area_id'   => $subArea?->id,
                'categoria_id'  => $categoria->id,
                'marca_id'      => $marca->id,
                'proveedor_id'  => 1,
                'user_id'       => 1,
                'nombre'        => $item['nombre'],
                'descripcion'   => $item['descripcion'],
                'foto'          => null,
            ]);

            // Aquí definimos stock manualmente según el nombre del producto
            $stockData = match (strtolower($item['nombre'])) {
                'algodón hidrófilo 100g' => ['medida' => 'unidad', 'cantidad' => 8],
                'algodón 500g' => ['medida' => 'unidad', 'cantidad' => 1],
                'algodón 25g' => ['medida' => 'unidad', 'cantidad' => 10],
                'esparadrapo 1.5mm x 1.8mt' => ['medida' => 'unidad', 'cantidad' => 1],
                'esparadrapo 2.5mm x 5y' => ['medida' => 'unidad', 'cantidad' => 2],
                'guantes de látex talla l' => ['medida' => 'caja', 'cantidad' => 2],
                'formato de operación transportes' => ['medida' => 'unidad', 'cantidad' => 3],
                'orden de servicio para transporte' => ['medida' => 'unidad', 'cantidad' => 1],
                'guía de remisión remitente' => ['medida' => 'unidad', 'cantidad' => 4],
                'guía de remisión transportista' => ['medida' => 'unidad', 'cantidad' => 1],
                'nota de crédito' => ['medida' => 'unidad', 'cantidad' => 8],
                'vales de combustible' => ['medida' => 'unidad', 'cantidad' => 19],
                'limpiaparabrisas 1 litro' => ['medida' => 'litro', 'cantidad' => 4],
                'agua para baterías 1.1l' => ['medida' => 'litro', 'cantidad' => 11],
                'forza plus azul 15w/40 1/4gl' => ['medida' => 'galón', 'cantidad' => 10],
                'aditivo diesel 300ml' => ['medida' => 'mililitro', 'cantidad' => 10],
                'aceite transmec dual 75w-90' => ['medida' => 'balde', 'cantidad' => 1],
                'alarma de retroceso' => ['medida' => 'unidad', 'cantidad' => 2],
                'fusible uña verde 32v' => ['medida' => 'unidad', 'cantidad' => 7],
                'fusible uña marrón 32v' => ['medida' => 'unidad', 'cantidad' => 13],
                'fusible uña amarillo 32v' => ['medida' => 'unidad', 'cantidad' => 20],
                'fusible uña blanco 32v' => ['medida' => 'unidad', 'cantidad' => 10],
                'fusible uña rojo 32v' => ['medida' => 'unidad', 'cantidad' => 49],
                'disco de corte 115x1x22.23mm' => ['medida' => 'unidad', 'cantidad' => 9],
                'disco de desbaste 115x6x22.23mm' => ['medida' => 'unidad', 'cantidad' => 3],
                'disco corte acero inox 230x1.9x22.23mm' => ['medida' => 'unidad', 'cantidad' => 6],
                'disco desbaste 115x6x22.23mm' => ['medida' => 'unidad', 'cantidad' => 10],
                'disco desbaste 230x6x22.23mm' => ['medida' => 'unidad', 'cantidad' => 3],
                'disco desbaste 180x6x22mm' => ['medida' => 'unidad', 'cantidad' => 11],
                'pernos 3/8 x 4"' => ['medida' => 'unidad', 'cantidad' => 30],
                'pernos 1/2 x 4"' => ['medida' => 'unidad', 'cantidad' => 7],
                'autorroscante 1/4 x 5"' => ['medida' => 'unidad', 'cantidad' => 7],
                'pernos 3/8 x 2"' => ['medida' => 'unidad', 'cantidad' => 17],
                'pernos 9/16" (kg)' => ['medida' => 'kilo', 'cantidad' => 3],
                default => null,
            };

            if ($stockData) {
                Stock::create([
                    'producto_id' => $producto->id,
                    'medida' => $stockData['medida'],
                    'cantidad' => $stockData['cantidad'],
                    'minimo' => 1,
                    'maximo' => $stockData['cantidad'] + 5,
                ]);
            }
        }
    }
}
