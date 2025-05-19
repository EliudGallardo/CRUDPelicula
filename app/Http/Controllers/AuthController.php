<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('usuario', 'password');

        $request->validate([
            'usuario' => 'required',
            'password' => 'required',
        ]);

        // Intentar autenticarse con las credenciales
        if (Auth::attempt($credentials)) {
            // Regenerar la sesión para evitar vulnerabilidades
            $request->session()->regenerate();
            return redirect()->intended(route('inicio'))->with('success', 'Inicio de sesión exitoso.');
        }

        return back()->withErrors([
            'usuario' => 'Usuario o contraseña incorrectos.',
        ]);
    }

    public function logout(Request $request)
    {
        // Cerrar sesión y redirigir a la página de login
        Auth::logout();
        $request->session()->invalidate();       // Invalida sesión actual
        $request->session()->regenerateToken();  // Regenera el token CSRF

        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
    }
}
