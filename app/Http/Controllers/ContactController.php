<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Aquí podrías validar/guardar/enviar correo...
        // $request->validate([...]);

        return back()->with('success', 'Mensaje enviado');
    }
}
