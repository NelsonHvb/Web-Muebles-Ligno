<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function updateProfile(Request $request)
    {
        $request->validate([
            'TelefonoUsuario' => ['nullable', 'string', 'max:25'],
            'DireccionUsuario' => ['nullable', 'string', 'max:255'],
        ]);

        $user = auth()->user();

        $user->TelefonoUsuario  = $request->TelefonoUsuario;
        $user->DireccionUsuario = $request->DireccionUsuario;
        $user->save();

        return back()->with('success', 'Perfil actualizado.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->getAuthPassword())) {
            return back()->withErrors(['current_password' => 'La contraseña actual no es correcta.']);
        }

        if (Hash::check($request->password, $user->getAuthPassword())) {
            return back()->withErrors(['password' => 'La nueva contraseña no puede ser igual a la actual.']);
        }

        $user->PasswordHash = $request->password;
        $user->save();

        return back()->with('success', 'Contraseña actualizada.');
    }

    public function destroy(Request $request)
    {
        $user = auth()->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Cuenta eliminada.');
    }
}
