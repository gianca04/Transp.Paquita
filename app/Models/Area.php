<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    /**
     * Obtener las subáreas asociadas con el área.
     * Relación uno a muchos.
     */
    public function subAreas()
    {
        return $this->hasMany(SubArea::class, 'area_id');
    }


    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
