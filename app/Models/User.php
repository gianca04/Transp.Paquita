<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nombre',
        'apellido',
        'tipo_documento',
        'numero_documento',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function getTipoDocumentoAttribute($value)
    {
        return ucfirst($value); // Convierte el valor del ENUM a la primera letra en mayúsculas
    }

        public function productos()
    {
        return $this->hasMany(Producto::class);
    }
        public function entradas()
    {
        return $this->hasMany(Entrada::class, 'user_id');
    }

        public function salidas()
    {
        return $this->hasMany(Salida::class, 'user_id');
    }

        public function getFullNameAttribute()
    {
        return $this->nombre . ' ' . $this->apellido . ' - ' . $this->numero_documento;
    }
     
}
