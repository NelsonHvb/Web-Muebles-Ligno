<?php

namespace App\Http\Controllers;

use App\Models\BitacoraMov;
use App\Models\Solicitud;
use App\Models\BitacoraSolicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolicitudesController extends Controller
{
    private const ESTADO_PENDIENTE = 'P'; // <- aquí

    public function index()
    {
        if (auth()->user()->can('manage-roles')) {
            return redirect()->route('admin.solicitudes.index');
        }

        $solicitudes = Solicitud::where('UserId', auth()->id())
            ->orderByDesc('created_at')
            ->get();

        return view('solicitudes.index', compact('solicitudes'));
    }


    public function create()
    {
        return view('solicitudes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'TipoMueble'      => ['required','string','max:80'],
            'Dimensiones'     => ['required','string','max:120'],
            'MaterialAcabado' => ['required','string','max:120'],
            'Descripcion'     => ['required','string'],
            'Telefono'        => ['required','string','max:20'],
        ]);

        $solicitud = null;

        DB::transaction(function () use ($data, $request, &$solicitud) {
            $solicitud = Solicitud::create([
            'UserId' => auth()->id(),
            'Tipo'   => 'PERSONALIZADA',
            'Mensaje' =>
                "Tipo mueble: {$data['TipoMueble']}\n" .
                "Dimensiones: {$data['Dimensiones']}\n" .
                "Material/Acabado: {$data['MaterialAcabado']}\n" .
                "Descripción: {$data['Descripcion']}\n" .
                "Teléfono: {$data['Telefono']}",
            'Estado' => self::ESTADO_PENDIENTE, // 'P'
            ]);

            BitacoraMov::create([
                'SolicitudId' => $solicitud->SolicitudId,
                'UserId'      => auth()->id(),
                'Accion'      => 'CREAR',
                'Antes'       => null,
                'Despues'     => $solicitud->toArray(),
                'Ip'          => $request->ip(),
            ]);
        });

        // Admin -> bandeja admin / Cliente -> detalle (confirmación)
        if (auth()->user()->can('manage-roles')) {
            return redirect()->route('admin.solicitudes.index')
                ->with('status', 'Solicitud enviada. Quedó en estado Pendiente.');
        }

        return redirect()->route('solicitudes.show', $solicitud)
            ->with('status', 'Solicitud enviada. Quedó en estado Pendiente.');
    }

        public function show(Solicitud $solicitud)
    {
        abort_unless((int) $solicitud->UserId === (int) auth()->id(), 403);

        $solicitud->load('usuario');

        return view('solicitudes.show', compact('solicitud'));
    }

}


