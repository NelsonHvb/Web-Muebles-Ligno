<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;


class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        DB::table('dbo.TBBitacoraES')->insert([
            'UserId'  => $event->user->UserId ?? $event->user->id, // por si tu modelo usa UserId
            'Fecha'   => now(),
            'Accion'  => 'LOGIN',
            'Detalle' => 'IP: ' . request()->ip(),
        ]);
    }
}
