<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'usuario' => 'required|unique:users',
        'email' => 'required|email|unique:users', // Asegúrate de que el email sea único
        'password' => 'required|min:8',
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->usuario = $request->usuario;
    $user->email = $request->email; // Guardar el correo electrónico
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->route('login')->with('success', 'Registro exitoso, por favor inicia sesión.');
    }
}


