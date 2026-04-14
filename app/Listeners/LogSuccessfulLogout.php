<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class LogSuccessfulLogout
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
    public function handle(Logout $event): void
    {
        DB::table('dbo.TBBitacoraES')->insert([
        'UserId'  => optional($event->user)->UserId ?? optional($event->user)->id ?? 0,
        'Fecha'   => now(),
        'Accion'  => 'LOGOUT',
        'Detalle' => 'IP: ' . request()->ip(),
    ]);
    }
}
