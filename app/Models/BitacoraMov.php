<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BitacoraMov extends Model
{
    protected $table = 'TBBitacoraMOV';
    protected $primaryKey = 'BitacoraSolicitudId';
    public $timestamps = true;

    protected $fillable = [
    'SolicitudId',
    'UserId',
    'Accion',
    'Detalle',
    'Modulo',
    'RegistroId',
    'Antes',
    'Despues',
    'Ip',
];


    protected $casts = [
        'Antes' => 'array',
        'Despues' => 'array',
    ];
    
}
