<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'TBSolicitudes';
    protected $primaryKey = 'SolicitudId';

    protected $fillable = [
        'UserId',
        'Tipo',
        'Mensaje',
        'Estado',
        'DescripcionAdmin',
    ];

    protected $casts = [
        'SolicitudId' => 'integer',
        'UserId' => 'integer',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'UserId', 'UserId');
    }
}
