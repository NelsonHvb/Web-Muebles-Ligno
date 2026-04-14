<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BitacoraESController extends Controller
{
    public function index(Request $request)
{
    $q = DB::table('dbo.TBBitacoraES as b')
        ->join('dbo.TBUsuarios as u', 'u.UserId', '=', 'b.UserId')
        ->select([
            'b.BitacoraESId',
            'b.UserId',
            'u.Usuario',
            'u.Email',
            'b.Fecha',
            'b.Accion',
            'b.Detalle',
        ])
        ->orderByDesc('b.BitacoraESId');

    // Filtro general (UserId, Usuario o Email)
    if ($request->filled('search')) {
        $search = $request->search;

        $q->where(function ($sub) use ($search) {
            $sub->where('u.Usuario', 'like', "%{$search}%")
                ->orWhere('u.Email', 'like', "%{$search}%")
                ->orWhere('b.UserId', $search); // si escriben un número exacto
        });
    }

    // Filtro por acción (LOGIN/LOGOUT)
    if ($request->filled('accion')) {
        $q->where('b.Accion', $request->accion);
    }

    // Filtros por fecha (opcional)
    if ($request->filled('desde')) {
        $q->whereDate('b.Fecha', '>=', $request->desde);
    }
    if ($request->filled('hasta')) {
        $q->whereDate('b.Fecha', '<=', $request->hasta);
    }

    $rows = $q->paginate(15)->withQueryString(); // conserva filtros al cambiar página
    return view('bitacoras.usuarios', compact('rows'));
}
}
