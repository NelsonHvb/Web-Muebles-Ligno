<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'TBRoles';
    protected $primaryKey = 'RolId';
    public $timestamps = false;

    protected $fillable = ['Nombre', 'EstadoRol'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'TBUsuariosRoles', 'RolId', 'UserId');
    }

    public function scopeActivos($q)
    {
        return $q->where('EstadoRol', 'A');
    }
}
