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
            // Inventario
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'BRIDGESTONE', 'nombre' => '265/65R 17 A/T 112T - CAMIONETA', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'TECHKING', 'nombre' => '295/80Rx22.5 18PR TECHKING TKAM II TL MIX', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'TECHKING', 'nombre' => '12.00Rx20 22PR TECHKING ETOT TCF POS', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'GOODYEAR', 'nombre' => '265/65R17 WRANGLER ARMORTRAC 112H SL', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'GOODYEAR', 'nombre' => '245/70R16 WRANGLER ARMORTRAC 113/110S', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'GOODYEAR', 'nombre' => 'LLANTA 265/65R17 DE SEGUNDA', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Materiales', 'marca' => null, 'nombre' => 'PISO RANULADO NEGRO', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Materiales', 'marca' => null, 'nombre' => 'PISO TRANSPARENTE', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Materiales', 'marca' => null, 'nombre' => 'MALLA NEGRA', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Materiales', 'marca' => null, 'nombre' => 'MANGUERA 1 1/2"', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'TECHKING', 'nombre' => '12 R 22.5', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'TECHKING', 'nombre' => '12R 20', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'TECHKING', 'nombre' => '295/80R22.5 18 PR', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'APOLLO', 'nombre' => '295/80R22.5', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'GOOD YEAR', 'nombre' => '247/70R16', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'GOOD YEAR', 'nombre' => '12.00 R 20', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'GOOD YEAR', 'nombre' => '12.00 R 20 ARMADA', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'APOLLO', 'nombre' => '12R 22.5', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'TECHKING', 'nombre' => '22.5 x 8.25 ARMADA', 'descripcion' => '', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'GOODYEAR', 'nombre' => 'Llanta 12.00 R20 Reencauchada', 'descripcion' => 'Llanta reencauchada modelo 12.00 R20', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'GOODYEAR', 'nombre' => 'Llanta 12.00 R22.5 Reencauchada', 'descripcion' => 'Llanta reencauchada modelo 12.00 R22.5', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'TECHKING', 'nombre' => 'Llanta 12.00 R20 Reencauchada', 'descripcion' => 'Llanta reencauchada modelo 12.00 R20', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'DUNLOP', 'nombre' => 'Llanta 12.00 R20 Reencauchada', 'descripcion' => 'Llanta reencauchada modelo 12.00 R20', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'MICHELIN', 'nombre' => 'Llanta 295/80 R22.5 Reencauchada', 'descripcion' => 'Llanta reencauchada modelo 295/80 R22.5', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Neumáticos', 'marca' => 'DOUBLE HAPPINESS', 'nombre' => 'Llanta 12.00 R22.5 Armada Reencauchada', 'descripcion' => 'Llanta armada reencauchada modelo 12.00 R22.5', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Protectores', 'marca' => null, 'nombre' => 'Protector Extra Reforzado', 'descripcion' => 'Protector modelo 20-8R Extra Reforzado', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Aros', 'marca' => 'EUROPEO', 'nombre' => 'Aro 22.5 x 8.5', 'descripcion' => 'Aro modelo 22.5 x 8.5 con 10H de fijación', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Inventario', 'sub' => null, 'categoria' => 'Cámaras', 'marca' => 'NEXEN', 'nombre' => 'Cámara 12.00R20 TR 78A', 'descripcion' => 'Cámara modelo 12.00R20 TR 78A', 'proveedor_id' => 1, 'user_id' => 1],
            // Bioseguridad
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'TOP MEDIC', 'nombre' => 'Venditas o Curitas Unidad', 'descripcion' => 'Venditas o curitas unidad', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'ALKHOFARMA', 'nombre' => 'Alcohol Puro 70° 120ml', 'descripcion' => 'Alcohol puro 70° 120ml', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'ALKHOFARMA', 'nombre' => 'Alcohol 70° 1000ml', 'descripcion' => 'Alcohol 70° 1000ml', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'ALKHOFARMA', 'nombre' => 'Agua Oxigenada 120ml', 'descripcion' => 'Agua oxigenada 120ml', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'D Y R', 'nombre' => 'Agua Oxigenada 60ml', 'descripcion' => 'Agua oxigenada 60ml', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'MEDIFARMA', 'nombre' => 'Isodine 60ml', 'descripcion' => 'Isodine 60ml', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'MAMELUCO', 'nombre' => 'Mandil Descartable Unidad', 'descripcion' => 'Mandil descartable unidad', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'STEEL PRO', 'nombre' => 'Caretas Faciales con Lente Unidad', 'descripcion' => 'Caretas faciales con lente unidad', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => null, 'nombre' => 'Mica para Casco Unidad', 'descripcion' => 'Mica para casco unidad', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => null, 'nombre' => 'Mascarilla con Respirador NP 305', 'descripcion' => 'Mascarilla con respirador NP 305', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => null, 'nombre' => 'Mascarilla con Respirador NP 306', 'descripcion' => 'Mascarilla con respirador NP 306', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'MASTHERS', 'nombre' => 'Respiradores Tipo AS', 'descripcion' => 'Respiradores tipo AS', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'SPY', 'nombre' => 'Sobre Lentes de Seguridad Claros', 'descripcion' => 'Sobre lentes de seguridad claros', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'SPY', 'nombre' => 'Lentes de Seguridad Claros', 'descripcion' => 'Lentes de seguridad claros', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'PERU', 'nombre' => 'Cartucho Contra Polvos Unidad', 'descripcion' => 'Cartucho contra polvos unidad', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => '3M', 'nombre' => 'Repuesto de Respirador Monovio para Polvos y Partículas', 'descripcion' => 'Repuesto de respirador monovio para polvos y partículas', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => null, 'nombre' => 'Cartucho de Vapor Orgánico Unidad', 'descripcion' => 'Cartucho de vapor orgánico unidad', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'STEEL PRO', 'nombre' => 'Tapón de Oído Unidad', 'descripcion' => 'Tapón de oído unidad', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => '3M', 'nombre' => 'Cinta de Peligro Amarillo', 'descripcion' => 'Cinta de peligro amarillo', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => '3M', 'nombre' => 'Cinta Roja y Blanca 50.8 x 45.7mm', 'descripcion' => 'Cinta roja y blanca 50.8 x 45.7mm', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'SMITH', 'nombre' => 'Jelonet 10 x 10 Caja', 'descripcion' => 'Jelonet 10 x 10 caja', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'PHARMA', 'nombre' => 'Cloruro de Sodio 100ml', 'descripcion' => 'Cloruro de sodio 100ml', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'MEDICAL', 'nombre' => 'Venda Elástica 2" x 5yardas', 'descripcion' => 'Venda elástica 2" x 5yardas', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'MEDICAL', 'nombre' => 'Venda Elástica 10" x 5yardas', 'descripcion' => 'Venda elástica 10" x 5yardas', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'ALKHOFAR', 'nombre' => 'Venda Elástica 3" x 5yardas', 'descripcion' => 'Venda elástica 3" x 5yardas', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'ALKHOFAR', 'nombre' => 'Venda Elástica 4" x 5yardas', 'descripcion' => 'Venda elástica 4" x 5yardas', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'MEDICAL', 'nombre' => 'Venda Elástica 6" x 5yardas', 'descripcion' => 'Venda elástica 6" x 5yardas', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => null, 'nombre' => 'Barbiquejo Unidad', 'descripcion' => 'Barbiquejo unidad', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => '3M', 'nombre' => 'Retentor para Filtro 501 Unidad', 'descripcion' => 'Retentor para filtro 501 unidad', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => '3M', 'nombre' => 'Filtro para Partículas N95-P25', 'descripcion' => 'Filtro para partículas N95-P25', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => null, 'nombre' => 'Collarín Unidad', 'descripcion' => 'Collarín unidad', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => null, 'nombre' => 'Bolsas Rojas Unidad', 'descripcion' => 'Bolsas rojas unidad', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'BLACK SMITH', 'nombre' => 'Kit Antiderrames para Hidrocarburos', 'descripcion' => 'Kit antiderrames para hidrocarburos', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'MEDICAL', 'nombre' => 'Gasa Estéril 10cm x 10cm', 'descripcion' => 'Gasa estéril 10cm x 10cm', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'FARMAPRECIO', 'nombre' => 'Esponja de Gasa 10cm x 10cm', 'descripcion' => 'Esponja de gasa 10cm x 10cm', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => null, 'nombre' => 'Aposito de Gasa y Algodón 10cm x 20cm', 'descripcion' => 'Aposito de gasa y algodón 10cm x 20cm', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => null, 'nombre' => 'Mameluco Anaranjados Unidad', 'descripcion' => 'Mameluco anaranjados unidad', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Bioseguridad', 'sub' => 'Almacén EPP', 'categoria' => 'Consumibles', 'marca' => 'GENESIS', 'nombre' => 'Mameluco Microporoso Unidad', 'descripcion' => 'Mameluco microporoso unidad', 'proveedor_id' => 1, 'user_id' => 1],
            // Formatos
            ['area' => 'Formatos', 'sub' => null, 'categoria' => 'Documentos', 'marca' => 'PAQUITA', 'nombre' => 'Reporte Diario', 'descripcion' => 'Reporte diario', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Formatos', 'sub' => null, 'categoria' => 'Documentos', 'marca' => 'PAQUITA', 'nombre' => 'Permiso Principal de Trabajo', 'descripcion' => 'Permiso principal de trabajo', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Formatos', 'sub' => null, 'categoria' => 'Documentos', 'marca' => 'PAQUITA', 'nombre' => 'Reporte Diario de Transporte de Lodos', 'descripcion' => 'Reporte diario de transporte de lodos', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Formatos', 'sub' => null, 'categoria' => 'Documentos', 'marca' => 'PAQUITA', 'nombre' => 'Recibo de Egreso de Caja', 'descripcion' => 'Recibo de egreso de caja', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Formatos', 'sub' => null, 'categoria' => 'Documentos', 'marca' => 'PAQUITA', 'nombre' => 'Permiso de Trabajo de Altura', 'descripcion' => 'Permiso de trabajo de altura', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Formatos', 'sub' => null, 'categoria' => 'Documentos', 'marca' => 'PAQUITA', 'nombre' => 'Análisis de Riesgos de la Tarea', 'descripcion' => 'Análisis de riesgos de la tarea', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Formatos', 'sub' => null, 'categoria' => 'Documentos', 'marca' => 'OIG', 'nombre' => 'Permiso Principal de Trabajo OIG', 'descripcion' => 'Permiso principal de trabajo OIG', 'proveedor_id' => 1, 'user_id' => 1],
            // Pintado
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'CHEMISA', 'nombre' => 'Preservante para Madera Esmalte', 'descripcion' => 'Preservante para madera esmalte', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'THONEER L COLOR', 'nombre' => 'Living Gloss Verde', 'descripcion' => 'Living gloss verde', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'TORO', 'nombre' => 'Rodillos 9"', 'descripcion' => 'Rodillos 9"', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'VISTONY', 'nombre' => 'Aceite Forza Plus Azul 1 Galón 15W-40', 'descripcion' => 'Aceite forza plus azul 1 galón 15W-40', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'VISTONY', 'nombre' => 'Líquido para Freno 237ml', 'descripcion' => 'Líquido para freno 237ml', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'VISTONY', 'nombre' => 'Forza Plus Dorado 15W/40 1/4GL', 'descripcion' => 'Forza plus dorado 15W/40 1/4GL', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'VISTONY', 'nombre' => 'Limpia Contacto 226ml', 'descripcion' => 'Limpia contacto 226ml', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'VISTONY', 'nombre' => 'Fluido para Transmisión Automática ATF 1/4GL', 'descripcion' => 'Fluido para transmisión automática ATF 1/4GL', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => null, 'nombre' => 'Cinta Multiuso Plomo 48mm x 54mm', 'descripcion' => 'Cinta multiuso plomo 48mm x 54mm', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'PURISIMA', 'nombre' => 'Agua Acidulada Aditivada 1 Galón', 'descripcion' => 'Agua acidulada aditivada 1 galón', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'WURTH', 'nombre' => 'Limpiador de Radiador y Sistema de Refrigeración 250ml', 'descripcion' => 'Limpiador de radiador y sistema de refrigeración 250ml', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'VISTONY', 'nombre' => 'Grasa Multipropósito Lithium EP-2 Balde', 'descripcion' => 'Grasa multipropósito lithium EP-2 balde', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'SARVI', 'nombre' => 'Silicona para Tablero 5 Galones', 'descripcion' => 'Silicona para tablero 5 galones', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'CII', 'nombre' => 'Aceite para Compresor de Aire 1 Galón', 'descripcion' => 'Aceite para compresor de aire 1 galón', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'SHELL HELIZ', 'nombre' => 'Aceite 10W40', 'descripcion' => 'Aceite 10W40', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'LIQUIMOLY', 'nombre' => 'Líquido de Limpieza de Radiador 300ml', 'descripcion' => 'Líquido de limpieza de radiador 300ml', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => null, 'nombre' => 'Multiusos WD-40', 'descripcion' => 'Multiusos WD-40', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'WURTH', 'nombre' => 'Aditivo Sellador para Radiador 300ml', 'descripcion' => 'Aditivo sellador para radiador 300ml', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'TEKNO', 'nombre' => 'Insecticida 1 Galón', 'descripcion' => 'Insecticida 1 galón', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'VISTONY', 'nombre' => 'Limpia Carburador 296ml', 'descripcion' => 'Limpia carburador 296ml', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'WURTH', 'nombre' => 'Afloja Piezas de Alta 30ml', 'descripcion' => 'Afloja piezas de alta 30ml', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'VISTONY ATF', 'nombre' => 'Fluido de Transmisión Automático 56 Galones Balde', 'descripcion' => 'Fluido de transmisión automático 56 galones balde', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'QUITAFACIL', 'nombre' => 'Quita Sarro 1/2 Galón', 'descripcion' => 'Quita sarro 1/2 galón', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'DIAMANTE', 'nombre' => 'Saca Sarro 4000g', 'descripcion' => 'Saca sarro 4000g', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'CASTROL CRB', 'nombre' => 'Aceite 25W60 5 Galones 2 Baldes', 'descripcion' => 'Aceite 25W60 5 galones 2 baldes', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Pintado', 'sub' => null, 'categoria' => 'Consumibles', 'marca' => 'CASTROL CRB', 'nombre' => 'Aceite 15W40 5 Galones 1 Balde', 'descripcion' => 'Aceite 15W40 5 galones 1 balde', 'proveedor_id' => 1, 'user_id' => 1],
            // Electricidad
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'HELLA', 'nombre' => 'Fusibles Uña Grande Celeste 32V', 'descripcion' => 'Fusibles uña grande celeste 32V', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'HELLA', 'nombre' => 'Fusibles Uña Grande Verde 32V', 'descripcion' => 'Fusibles uña grande verde 32V', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'HELLA', 'nombre' => 'Fusibles Uña Grande Naranja 32V', 'descripcion' => 'Fusibles uña grande naranja 32V', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'HELLA', 'nombre' => 'Fusibles Uña Grande Rojo 32V', 'descripcion' => 'Fusibles uña grande rojo 32V', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'HELLA', 'nombre' => 'Fusibles Mini Uña Marrón 32V', 'descripcion' => 'Fusibles mini uña marrón 32V', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'HELLA', 'nombre' => 'Fusibles Mini Uña Celeste 32V', 'descripcion' => 'Fusibles mini uña celeste 32V', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'HELLA', 'nombre' => 'Fusibles Mini Uña Amarillo 32V', 'descripcion' => 'Fusibles mini uña amarillo 32V', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'HELLA', 'nombre' => 'Fusible Mini Uña Blanco 32V', 'descripcion' => 'Fusible mini uña blanco 32V', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'HELLA', 'nombre' => 'Fusible Mini Uña Verde 32V', 'descripcion' => 'Fusible mini uña verde 32V', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'NARVA', 'nombre' => 'Foco Estándar P21W 24V 21W', 'descripcion' => 'Foco estándar P21W 24V 21W', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'NARVA', 'nombre' => 'Foco Estándar P21/5W 12V 21/5W', 'descripcion' => 'Foco estándar P21/5W 12V 21/5W', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'NARVA', 'nombre' => 'Foco Estándar P21W 12V 21W', 'descripcion' => 'Foco estándar P21W 12V 21W', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'NARVA', 'nombre' => 'Foco Estándar P21/5W 24V 21/5W', 'descripcion' => 'Foco estándar P21/5W 24V 21/5W', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'NARVA', 'nombre' => 'Foco Estándar H1 24V 70W', 'descripcion' => 'Foco estándar H1 24V 70W', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'NARVA', 'nombre' => 'Foco Estándar H3 24V 70W', 'descripcion' => 'Foco estándar H3 24V 70W', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'NARVA', 'nombre' => 'Foco Estándar H4 12V 60/55W', 'descripcion' => 'Foco estándar H4 12V 60/55W', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'NARVA', 'nombre' => 'Foco Estándar H7 12V 55W', 'descripcion' => 'Foco estándar H7 12V 55W', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'NARVA', 'nombre' => 'Foco Estándar H7 24V 70W', 'descripcion' => 'Foco estándar H7 24V 70W', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'NARVA', 'nombre' => 'Foco Estándar R5W 24V 5W', 'descripcion' => 'Foco estándar R5W 24V 5W', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'NARVA', 'nombre' => 'Foco Estándar T10 5*43 24V 5W', 'descripcion' => 'Foco estándar T10 5*43 24V 5W', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'NARVA', 'nombre' => 'Foco Estándar H21W 24V 21W', 'descripcion' => 'Foco estándar H21W 24V 21W', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'NARVA', 'nombre' => 'Foco Amber PY21W Heavy Duty 24V 21W', 'descripcion' => 'Foco amber PY21W heavy duty 24V 21W', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'NARVA', 'nombre' => 'Foco Amber PY21W 12V 21W', 'descripcion' => 'Foco amber PY21W 12V 21W', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'NARVA', 'nombre' => 'Foco Standard W5W 24V 5W', 'descripcion' => 'Foco standard W5W 24V 5W', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'NARVA', 'nombre' => 'Foco Rallye 24V 100W', 'descripcion' => 'Foco rallye 24V 100W', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'TRUCK LAMP', 'nombre' => 'Faro Lateral 10-30V Ambar', 'descripcion' => 'Faro lateral 10-30V ambar', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Faro Posterior Ambar', 'descripcion' => 'Faro posterior ambar', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Focos de Comboi Ambar 12-24V', 'descripcion' => 'Focos de comboi ambar 12-24V', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Bombillo Volvo', 'descripcion' => 'Bombillo Volvo', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'WURTH', 'nombre' => 'Bombillo H7 24V 70W', 'descripcion' => 'Bombillo H7 24V 70W', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'SAP', 'nombre' => 'Pieza de Repuesto Hembra', 'descripcion' => 'Pieza de repuesto hembra', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Cable Azul THW-90+PLUS', 'descripcion' => 'Cable azul THW-90+PLUS', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Cable Negro THW-90-1X12', 'descripcion' => 'Cable negro THW-90-1X12', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Cable Rojo THW-90-1X14', 'descripcion' => 'Cable rojo THW-90-1X14', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Cable Blanco THW-90-18 AWG', 'descripcion' => 'Cable blanco THW-90-18 AWG', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Cable Azul THW-90-18 AWG', 'descripcion' => 'Cable azul THW-90-18 AWG', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Cable Amarillo THW-90-18 AWG', 'descripcion' => 'Cable amarillo THW-90-18 AWG', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'MKL', 'nombre' => 'Cable Conector de Faro', 'descripcion' => 'Cable conector de faro', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Terminal de Compresión 3/8 - 90A', 'descripcion' => 'Terminal de compresión 3/8 - 90A', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'GPC', 'nombre' => 'Faro Posterior Ambar GPC', 'descripcion' => 'Faro posterior ambar GPC', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'PHILIPS', 'nombre' => 'Arrancador Azul-465W', 'descripcion' => 'Arrancador azul-465W', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Electricidad', 'sub' => 'Tableros', 'categoria' => 'Repuestos', 'marca' => 'BTICINO', 'nombre' => 'Caja Universal', 'descripcion' => 'Caja universal', 'proveedor_id' => 1, 'user_id' => 1],
            // Soldadura
            ['area' => 'Soldadura', 'sub' => null, 'categoria' => 'Herramientas', 'marca' => 'UBERMAN', 'nombre' => 'Disco Diamantado Universal 180mm x 22mm', 'descripcion' => 'Disco diamantado universal 180mm x 22mm', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Soldadura', 'sub' => null, 'categoria' => 'Herramientas', 'marca' => 'WURTH', 'nombre' => 'Disco de Alambre 150mm x 22.2mm', 'descripcion' => 'Disco de alambre 150mm x 22.2mm', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Soldadura', 'sub' => null, 'categoria' => 'Herramientas', 'marca' => null, 'nombre' => 'Vidrio para Soldar Negro', 'descripcion' => 'Vidrio para soldar negro', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Soldadura', 'sub' => null, 'categoria' => 'Herramientas', 'marca' => null, 'nombre' => 'Tizas Blancas', 'descripcion' => 'Tizas blancas', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Soldadura', 'sub' => null, 'categoria' => 'Herramientas', 'marca' => 'NAZCA', 'nombre' => 'Electrodos 6011 16KG', 'descripcion' => 'Electrodos 6011 16KG', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Soldadura', 'sub' => null, 'categoria' => 'Herramientas', 'marca' => 'NAZCA', 'nombre' => 'Electrodos 7018 24KG', 'descripcion' => 'Electrodos 7018 24KG', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Soldadura', 'sub' => null, 'categoria' => 'Herramientas', 'marca' => 'PRETUL', 'nombre' => 'Puesta a Tierra 300A', 'descripcion' => 'Puesta a tierra 300A', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Soldadura', 'sub' => null, 'categoria' => 'Herramientas', 'marca' => 'KWB', 'nombre' => 'Broca 10mm', 'descripcion' => 'Broca 10mm', 'proveedor_id' => 1, 'user_id' => 1],
            // Mecánica
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Arandelas Varias 2 Kilos', 'descripcion' => 'Arandelas varias 2 kilos', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Tuercas Varias 2 Kilos', 'descripcion' => 'Tuercas varias 2 kilos', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Remaches Unidad', 'descripcion' => 'Remaches unidad', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Pernos 1/4 x 1/2 Unidad', 'descripcion' => 'Pernos 1/4 x 1/2 unidad', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Clavo de Cemento 1/2 Kilo', 'descripcion' => 'Clavo de cemento 1/2 kilo', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Pernos 5/8" Unidad', 'descripcion' => 'Pernos 5/8" unidad', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Pernos Expansibles 1/2" Unidad', 'descripcion' => 'Pernos expansibles 1/2" unidad', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Clavos 1 x 17" 250 Gramos', 'descripcion' => 'Clavos 1 x 17" 250 gramos', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Protector de Motobomba Verde 35 Unidades', 'descripcion' => 'Protector de motobomba verde 35 unidades', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Pistón Circo', 'descripcion' => 'Pistón circo', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => 'SKF', 'nombre' => 'Cojinete', 'descripcion' => 'Cojinete', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Diferencial Bearing', 'descripcion' => 'Diferencial bearing', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Kit de Reparación de Quinta Rueda', 'descripcion' => 'Kit de reparación de quinta rueda', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Conector Hembra Plomo', 'descripcion' => 'Conector hembra plomo', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => 'INCCO', 'nombre' => 'Pistola de Pintura', 'descripcion' => 'Pistola de pintura', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Formador de Empaquetaduras', 'descripcion' => 'Formador de empaquetaduras', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Manito de Aire', 'descripcion' => 'Manito de aire', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Pistón Estándar', 'descripcion' => 'Pistón estándar', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => 'SAMAKAMA', 'nombre' => 'Filtro de Combustible', 'descripcion' => 'Filtro de combustible', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Sello Mecánico', 'descripcion' => 'Sello mecánico', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Ajustador', 'descripcion' => 'Ajustador', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Piezas de Válvula', 'descripcion' => 'Piezas de válvula', 'proveedor_id' => 1, 'user_id' => 1],
            ['area' => 'Mecánica', 'sub' => null, 'categoria' => 'Repuestos', 'marca' => null, 'nombre' => 'Hoja Sierra', 'descripcion' => 'Hoja sierra', 'proveedor_id' => 1, 'user_id' => 1],
        ];

        foreach ($productos as $item) {
            $area = Area::where('nombre', $item['area'])->first();
            $subArea = $item['sub'] ? SubArea::where('nombre', $item['sub'])->first() : null;
            
            // Buscar o crear categoría
            $categoria = Categoria::updateOrCreate(
                ['nombre' => $item['categoria']],
                [
                    'nombre' => $item['categoria'],
                    'descripcion' => 'Categoría creada automáticamente desde el seeder de productos.'
                ]
            );
            
            // Buscar marca, crear si no existe o si es null
            $marca = null;
            if ($item['marca']) {
                $marca = Marca::updateOrCreate(
                    ['nombre' => $item['marca']],
                    [
                        'nombre' => $item['marca'],
                        'descripcion' => 'Marca creada automáticamente desde el seeder de productos.'
                    ]
                );
            }

            // Validar que exista el área necesaria
            if (!$area) {
                echo "Error: Área '{$item['area']}' no encontrada para producto '{$item['nombre']}'" . PHP_EOL;
                continue;
            }
            if ($item['sub'] && !$subArea) {
                echo "Advertencia: SubÁrea '{$item['sub']}' no encontrada para producto '{$item['nombre']}', continuando sin subárea" . PHP_EOL;
            }

            $producto = Producto::updateOrCreate(
                [
                    'nombre' => $item['nombre'],
                    'area_id' => $area->id,
                ],
                [
                    'area_id'       => $area->id,
                    'sub_area_id'   => $subArea?->id,
                    'categoria_id'  => $categoria->id,
                    'marca_id'      => $marca?->id,
                    'proveedor_id'  => $item['proveedor_id'],
                    'user_id'       => $item['user_id'],
                    'nombre'        => $item['nombre'],
                    'descripcion'   => $item['descripcion'],
                    'foto'          => null,
                ]
            );

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
                '265/65r 17 a/t 112t - camioneta' => ['medida' => 'unidad', 'cantidad' => 1],
                '295/80rx22.5 18pr techking tkam ii tl mix' => ['medida' => 'unidad', 'cantidad' => 1],
                '12.00rx20 22pr techking etot tcf pos' => ['medida' => 'unidad', 'cantidad' => 1],
                '265/65r17 wrangler armortrac 112h sl' => ['medida' => 'unidad', 'cantidad' => 1],
                '245/70r16 wrangler armortrac 113/110s' => ['medida' => 'unidad', 'cantidad' => 1],
                'llanta 265/65r17 de segunda' => ['medida' => 'unidad', 'cantidad' => 1],
                'piso ranulado negro' => ['medida' => 'unidad', 'cantidad' => 1],
                'piso transparente' => ['medida' => 'unidad', 'cantidad' => 1],
                'malla negra' => ['medida' => 'unidad', 'cantidad' => 1],
                'manguera 1 1/2"' => ['medida' => 'unidad', 'cantidad' => 1],
                '12 r 22.5' => ['medida' => 'unidad', 'cantidad' => 1],
                '12r 20' => ['medida' => 'unidad', 'cantidad' => 1],
                '295/80r22.5 18 pr' => ['medida' => 'unidad', 'cantidad' => 1],
                '295/80r22.5' => ['medida' => 'unidad', 'cantidad' => 1],
                '247/70r16' => ['medida' => 'unidad', 'cantidad' => 1],
                '12.00 r 20' => ['medida' => 'unidad', 'cantidad' => 1],
                '12.00 r 20 armada' => ['medida' => 'unidad', 'cantidad' => 1],
                'apollo' => ['medida' => 'unidad', 'cantidad' => 1],
                '22.5 x 8.25 armada' => ['medida' => 'unidad', 'cantidad' => 1],
                '20-8r extra reforzado s/m' => ['medida' => 'unidad', 'cantidad' => 1],
                '20-8.5 center (nuevo)' => ['medida' => 'unidad', 'cantidad' => 1],
                // Nuevos productos agregados con sus cantidades específicas
                'venditas o curitas unidad' => ['medida' => 'unidad', 'cantidad' => 200],
                'alcohol puro 70° 120ml' => ['medida' => 'unidad', 'cantidad' => 7],
                'alcohol 70° 1000ml' => ['medida' => 'unidad', 'cantidad' => 6],
                'agua oxigenada 120ml' => ['medida' => 'unidad', 'cantidad' => 1],
                'agua oxigenada 60ml' => ['medida' => 'unidad', 'cantidad' => 1],
                'isodine 60ml' => ['medida' => 'unidad', 'cantidad' => 3],
                'mandil descartable unidad' => ['medida' => 'unidad', 'cantidad' => 2],
                'caretas faciales con lente unidad' => ['medida' => 'unidad', 'cantidad' => 2],
                'mica para casco unidad' => ['medida' => 'unidad', 'cantidad' => 10],
                'mascarilla con respirador np 305' => ['medida' => 'unidad', 'cantidad' => 2],
                'mascarilla con respirador np 306' => ['medida' => 'unidad', 'cantidad' => 2],
                'respiradores tipo as' => ['medida' => 'unidad', 'cantidad' => 3],
                'sobre lentes de seguridad claros' => ['medida' => 'unidad', 'cantidad' => 13],
                'lentes de seguridad claros' => ['medida' => 'unidad', 'cantidad' => 6],
                'cartucho contra polvos unidad' => ['medida' => 'unidad', 'cantidad' => 10],
                'repuesto de respirador monovio para polvos y partículas' => ['medida' => 'unidad', 'cantidad' => 3],
                'cartucho de vapor orgánico unidad' => ['medida' => 'unidad', 'cantidad' => 2],
                'tapón de oído unidad' => ['medida' => 'unidad', 'cantidad' => 70],
                'cinta de peligro amarillo' => ['medida' => 'unidad', 'cantidad' => 1],
                'cinta roja y blanca 50.8 x 45.7mm' => ['medida' => 'unidad', 'cantidad' => 1],
                'jelonet 10 x 10 caja' => ['medida' => 'caja', 'cantidad' => 5],
                'cloruro de sodio 100ml' => ['medida' => 'unidad', 'cantidad' => 4],
                'venda elástica 2" x 5yardas' => ['medida' => 'unidad', 'cantidad' => 2],
                'venda elástica 10" x 5yardas' => ['medida' => 'unidad', 'cantidad' => 2],
                'venda elástica 3" x 5yardas' => ['medida' => 'unidad', 'cantidad' => 1],
                'venda elástica 4" x 5yardas' => ['medida' => 'unidad', 'cantidad' => 4],
                'venda elástica 6" x 5yardas' => ['medida' => 'unidad', 'cantidad' => 5],
                'barbiquejo unidad' => ['medida' => 'unidad', 'cantidad' => 1],
                'retentor para filtro 501 unidad' => ['medida' => 'unidad', 'cantidad' => 20],
                'filtro para partículas n95-p25' => ['medida' => 'unidad', 'cantidad' => 23],
                'collarín unidad' => ['medida' => 'unidad', 'cantidad' => 1],
                'bolsas rojas unidad' => ['medida' => 'unidad', 'cantidad' => 19],
                'kit antiderrames para hidrocarburos' => ['medida' => 'unidad', 'cantidad' => 1],
                'gasa estéril 10cm x 10cm' => ['medida' => 'unidad', 'cantidad' => 10],
                'esponja de gasa 10cm x 10cm' => ['medida' => 'unidad', 'cantidad' => 1],
                'aposito de gasa y algodón 10cm x 20cm' => ['medida' => 'unidad', 'cantidad' => 2],
                'mameluco anaranjados unidad' => ['medida' => 'unidad', 'cantidad' => 6],
                'mameluco microporoso unidad' => ['medida' => 'unidad', 'cantidad' => 3],
                'reporte diario' => ['medida' => 'unidad', 'cantidad' => 14],
                'permiso principal de trabajo' => ['medida' => 'unidad', 'cantidad' => 10],
                'reporte diario de transporte de lodos' => ['medida' => 'unidad', 'cantidad' => 21],
                'recibo de egreso de caja' => ['medida' => 'unidad', 'cantidad' => 21],
                'permiso de trabajo de altura' => ['medida' => 'unidad', 'cantidad' => 9],
                'análisis de riesgos de la tarea' => ['medida' => 'unidad', 'cantidad' => 16],
                'permiso principal de trabajo oig' => ['medida' => 'unidad', 'cantidad' => 2],
                default => ['medida' => 'unidad', 'cantidad' => 1], // Stock por defecto para productos no especificados
            };

            if ($stockData) {
                Stock::updateOrCreate(
                    ['producto_id' => $producto->id],
                    [
                        'producto_id' => $producto->id,
                        'medida' => $stockData['medida'],
                        'cantidad' => $stockData['cantidad'],
                        'minimo' => 1,
                        'maximo' => $stockData['cantidad'] + 5,
                    ]
                );
            }
        }
    }
}
