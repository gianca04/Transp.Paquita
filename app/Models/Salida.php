<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    // Si el nombre de la tabla es diferente al que Laravel espera (por ejemplo, la tabla 'salidas')
    // Si se usa el nombre de la tabla pluralizada, no es necesario especificar este campo
    protected $table = 'salidas';

    // Definir las relaciones con las otras tablas
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');  // Relación con el modelo User
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');  // Relación con el modelo Producto
    }

    // Especificamos los campos que pueden ser asignados en masa
    protected $fillable = [
        'user_id',
        'producto_id',
        'cantidad',
        'fecha',
        'hora',
        'destino',
    ];

    // Si deseas agregar reglas de validación o métodos personalizados, puedes hacerlo aquí
    public static function rules()
    {
        return [
            'destino' => 'required|string|max:255',  // Validar que destino sea requerido y tenga un formato correcto
            'cantidad' => 'required|integer|min:1',  // Asegurarse de que cantidad sea un número entero mayor que 0
        ];
    }
}
