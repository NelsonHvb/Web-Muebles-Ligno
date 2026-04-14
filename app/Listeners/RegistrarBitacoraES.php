<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;
use App\Models\BitacoraES;
use Illuminate\Support\Facades\Request; // Para obtener la IP
use Carbon\Carbon;

class RegistrarBitacoraES
{
    public function handle($event)
    {
        // $event->user contiene la información del usuario que acaba de actuar
        if (!$event->user) { return; }

        $accion = '';

        // Detectamos qué evento ocurrió
        if ($event instanceof Login) {
            $accion = 'LOGIN';
        } elseif ($event instanceof Logout) {
            $accion = 'LOGOUT';
        } elseif ($event instanceof Registered) {
            $accion = 'REGISTRO';
        }

        if ($accion) {
            BitacoraES::create([
                'UserId'  => $event->user->id, // O el ID que uses
                'Fecha'   => Carbon::now(),
                'Accion'  => $accion,
                'Detalle' => 'IP: ' . Request::ip() . ' - Navegador: ' . Request::header('User-Agent'),
            ]);
        }
    }
}