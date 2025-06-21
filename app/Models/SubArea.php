<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubArea extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'area_id',
        'nombre',
        'descripcion',
    ];

    /**
     * Obtener el área asociada con la subárea.
     * Relación inversa de muchos a uno.
     */
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

        public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
