<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    // Lista de solicitudes para el admin
    public function index()
    {
        $solicitudes = Solicitud::with('usuario')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.solicitudes.index', compact('solicitudes'));
    }

    // Aprobar solicitud
    public function aprobar(Request $request, Solicitud $solicitud)
    {
        $request->validate([
            'descripcion_admin' => 'nullable|string',
        ]);

        $solicitud->update([
            'Estado' => 'A',
            'DescripcionAdmin' => $request->input('descripcion_admin'),
        ]);

        return back()->with('status', 'Solicitud aprobada.');
    }

    // Rechazar solicitud
    public function rechazar(Request $request, Solicitud $solicitud)
    {
        $request->validate([
            'descripcion_admin' => 'nullable|string',
        ]);

        $solicitud->update([
            'Estado' => 'R',
            'DescripcionAdmin' => $request->input('descripcion_admin'),
        ]);

        return back()->with('status', 'Solicitud rechazada.');
    }
    
}
