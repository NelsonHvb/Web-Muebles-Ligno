<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\BitacoraMov;
use Illuminate\Http\Request;

class BitacoraMovController extends Controller
{
        public function index(Request $request)
    {
        $q = BitacoraMov::query()->orderByDesc('created_at');

        if ($request->filled('search')) {
            $s = trim($request->search);
            $q->where(function ($qq) use ($s) {
                if (ctype_digit($s)) {
                    $qq->orWhere('UserId', (int)$s)
                    ->orWhere('SolicitudId', (int)$s);
                } else {
                    $qq->orWhere('Ip', 'like', "%{$s}%")
                    ->orWhere('Accion', 'like', "%{$s}%");
                }
            });
        }

        if ($request->filled('accion')) $q->where('Accion', $request->accion);
        if ($request->filled('desde'))  $q->whereDate('created_at', '>=', $request->desde);
        if ($request->filled('hasta'))  $q->whereDate('created_at', '<=', $request->hasta);

        $movimientos = $q->paginate(20)->withQueryString(); // mantiene filtros en paginación [web:2709]

        $acciones = BitacoraMov::select('Accion')
        ->distinct()
        ->orderBy('Accion')
        ->pluck('Accion');

    return view('bitacoras.movimientos', compact('movimientos', 'acciones'));

    }


}
