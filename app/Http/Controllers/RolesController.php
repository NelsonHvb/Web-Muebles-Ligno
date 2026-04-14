<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Usuario;
use App\Models\UsuarioRol;
use App\Models\BitacoraMov;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    /**
     * Helper para registrar movimientos en la bitácora.
     */
    private function logMov(string $accion, string $detalle, ?int $registroId = null, $antes = null, $despues = null): void
    {
        // Compatibilidad: si tu usuario autenticado es el modelo Usuario (con UserId),
        // esto toma UserId; si es el User default de Laravel, toma id().
        $user = Auth::user();
        $userId = $user->UserId ?? Auth::id();

        BitacoraMov::create([
            'SolicitudId' => null,
            'UserId'      => $userId,
            'Accion'      => $accion,     // HABILITAR / DESHABILITAR / ASIGNAR_ROL / DESASIGNAR_ROL
            'Modulo'      => 'ROLES',
            'RegistroId'  => $registroId, // id del rol
            'Detalle'     => $detalle,    // texto corto (lo que pide la guía)
            'Antes'       => $antes,
            'Despues'     => $despues,
            'Ip'          => request()->ip(),
        ]);
    }

    // Listado y pantalla de mantenimiento
    public function index()
    {
        $roles = Rol::orderBy('RolId')->get();

        // importante: cargar roles de cada usuario
        $usuarios = Usuario::with('roles')
            ->orderBy('Usuario')
            ->get();

        return view('roles.index', compact('roles', 'usuarios'));
    }

    // Activar / desactivar rol (cambia EstadoRol en TBRoles)
    public function toggle(Rol $rol)
    {
        $antes = $rol->toArray();

        $rol->EstadoRol = $rol->EstadoRol === 'A' ? 'I' : 'A';
        $rol->save();

        $despues = $rol->fresh()->toArray();

        $accion = ($rol->EstadoRol === 'A') ? 'HABILITAR' : 'DESHABILITAR';
        $detalle = ($rol->EstadoRol === 'A')
            ? "Habilitó el rol: {$rol->Rol}"
            : "Deshabilitó el rol: {$rol->Rol}";

        $this->logMov($accion, $detalle, (int)$rol->RolId, $antes, $despues);

        return back()->with('status', 'Rol actualizado.');
    }

    // Asignar rol a un usuario (inserta en TBUsuariosRoles)
    public function asignarRol(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:TBUsuarios,UserId',
            'rol_id'  => 'required|exists:TBRoles,RolId',
        ]);

        $usuario = Usuario::where('UserId', $request->user_id)->first();
        $rol = Rol::where('RolId', $request->rol_id)->first();

        $registro = UsuarioRol::firstOrCreate([
            'UserId' => $request->user_id,
            'RolId'  => $request->rol_id,
        ]);

        $this->logMov(
            'ASIGNAR_ROL',
            "Asignó rol '{$rol->Rol}' al usuario '{$usuario->Usuario}'",
            (int)$rol->RolId,
            null,
            [
                'UserId' => (int)$request->user_id,
                'RolId'  => (int)$request->rol_id,
                'created' => $registro->wasRecentlyCreated,
            ]
        );

        return back()->with('status', 'Rol asignado correctamente.');
    }

    public function desasignarRol(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:TBUsuarios,UserId',
            'rol_id'  => 'required|exists:TBRoles,RolId',
        ]);

        $usuario = Usuario::where('UserId', $request->user_id)->first();
        $rol = Rol::where('RolId', $request->rol_id)->first();

        $deleted = UsuarioRol::where('UserId', $request->user_id)
            ->where('RolId', $request->rol_id)
            ->delete();

        $this->logMov(
            'DESASIGNAR_ROL',
            "Desasignó rol '{$rol->Rol}' del usuario '{$usuario->Usuario}'",
            (int)$rol->RolId,
            [
                'UserId' => (int)$request->user_id,
                'RolId'  => (int)$request->rol_id,
            ],
            [
                'deleted_rows' => $deleted,
            ]
        );

        return back()->with('status', 'Rol desasignado correctamente.');
    }
}
