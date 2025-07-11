<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'descripcion' => 'string', // Si es necesario, puedes agregar el tipo de campo
    ];

    /**
     * Obtener el nombre de la categoría.
     *
     * @return string
     */
    public function getNombreAttribute($value)
    {
        return ucfirst($value); // Convención de capitalizar la primera letra del nombre
    }
        public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
