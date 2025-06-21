<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    // Relación con la tabla 'productos' (un producto puede tener un registro de stock)
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'producto_id',
        'medida',
        'cantidad',
        'minimo',
        'maximo',
    ];

    // Reglas de validación
    public static function rules()
    {
        return [
            'producto_id' => 'required|exists:productos,id|unique:stocks,producto_id',  // Asegurarse de que el producto no tenga más de un registro
            'medida' => 'required|string|max:50',
            'cantidad' => 'required|numeric|min:0',  // Asegurarse de que cantidad sea un número decimal
            'minimo' => 'required|numeric|min:0',
            'maximo' => 'required|numeric|min:0|gt:minimo',  // maximo debe ser mayor que el minimo
        ];
    }
}
