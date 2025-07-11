<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'contacto',
        'telefono',
        'email',
        'direccion',
        'ruc',
        'descripcion',
    ];

    /**
     * Los atributos que deberían ser ocultados para los arreglos.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * Los atributos que deberían ser convertidos a tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    /**
     * Obtener el nombre completo del proveedor.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->nombre;
    }

        public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
