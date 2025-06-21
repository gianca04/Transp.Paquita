<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'descripcion' => 'string', // Si es necesario, puedes agregar el tipo de campo
    ];

    /**
     * Get the nombre of the marca.
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
