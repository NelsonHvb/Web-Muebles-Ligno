<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'TBUsuarios';
    protected $primaryKey = 'UserId';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'Usuario',
        'Email',
        'PasswordHash',
        'EstadoUsuario',
        'FechaRegistro',
    ];

    protected $hidden = [
        'PasswordHash',
    ];

    public function getAuthPassword()
    {
        return $this->PasswordHash;
    }

    // 👉 relación muchos a muchos con TBRoles vía TBUsuariosRoles
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'TBUsuariosRoles', 'UserId', 'RolId');
    }
}
