<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth; // ¡Esta es la que necesitas!

class Entrada extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',  // Usamos user_id como clave foránea
        'producto_id',
        'fecha',
        'hora',
        'tipo_documento',
        'numero_documento',
        'cantidad',
    ];

    /**
     * Relación con el modelo User.
     * Una entrada pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relación con el modelo Producto.
     * Una entrada pertenece a un producto.
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    protected static function booted()
    {
        static::creating(function ($entrada) {
            // Asignar el ID del usuario autenticado
            $entrada->user_id = optional(Auth::user())->id;
        });
        static::created(function ($entrada) {
            // Buscar el stock del producto
            $stock = Stock::where('producto_id', $entrada->producto_id)->first();
            if ($stock) {
                $stock->cantidad += $entrada->cantidad;
                $stock->save();
            }
        });
    }
}
