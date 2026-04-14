<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'nombre'   => ['required', 'string', 'max:255', 'unique:TBUsuarios,Usuario'],
        'email'    => ['required', 'string', 'lowercase', 'email:rfc,dns', 'max:255', 'unique:TBUsuarios,Email'],
        'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
    ]);

    $user = User::create([
        'Usuario'       => $request->nombre,
        'Email'         => $request->email,
        'PasswordHash'  => Hash::make($request->password),
        'EstadoUsuario' => 'I',
        'FechaRegistro' => now(),
    ]);

    event(new Registered($user));     // envía el correo

    // NO Auth::login($user);

    return redirect()->route('verification.notice'); // muestra la vista "verifica tu correo"
}


}
