<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Producto extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'area_id',
        'sub_area_id',
        'categoria_id',
        'marca_id',
        'proveedor_id',
        'user_id',
        'nombre',
        'descripcion',
        'foto',
    ];


    public function stock()
    {
        return $this->hasOne(Stock::class);
    }

    // ...existing code...
    /**
     * Relación con la tabla Areas.
     */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * Relación con la tabla Sub_Areas.
     */
    public function subArea()
    {
        return $this->belongsTo(SubArea::class);
    }

    /**
     * Relación con la tabla Categorias.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    /**
     * Relación con la tabla Marcas.
     */
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    /**
     * Relación con la tabla Proveedores.
     */
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    /**
     * Relación con la tabla Users.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function entradas()
    {
        return $this->hasMany(Entrada::class, 'producto_id');
    }

    public function salidas()
    {
        return $this->hasMany(Salida::class, 'producto_id');
    }
       protected static function booted()
    {
        static::creating(function ($producto) {
            // Asignar el ID del usuario autenticado
            $producto->user_id = optional(Auth::user())->id;
        });
    }
}
