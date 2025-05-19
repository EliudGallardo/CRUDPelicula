<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\User; // Supongo que usas este modelo para usuarios
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CatalogoController extends Controller
{
    public function inicio()
    {
        return view("pages.inicio", ["titulo" => "Inicio"]);
    }

    public function listado_peliculas()
    {
        $consulta = Catalogo::get();
        $peliculas = $consulta;
        return view("pages.listado_peliculas", ["titulo" => "Lista Peliculas", "peliculas" => $peliculas]);
    }

    public function agregar()
    {
        return view("pages.agregar", ["titulo" => "Agregar"]);
    }

    public function editar(Request $request)
    {
        
        $consulta = Catalogo::where("id", $request->id)->first();
        return view("pages.editar", ["titulo" => "Editar Pelicula", "pelicula" => $consulta]);
    }

    public function actualizar(Request $request, Catalogo $pelicula)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'genero' => 'required|string|max:100',
            'director' => 'required|string|max:100',
            'fecha_estreno' => 'required|date',
        ], [
            'titulo.required' => 'Falta título',
            'descripcion.required' => 'Falta descripción',
            'genero.required' => 'Falta género',
            'director.required' => 'Falta director',
            'fecha_estreno.required' => 'Falta fecha',
        ]);
        $pelicula->titulo = $request->titulo;
        $pelicula->descripcion = $request->descripcion;

        $pelicula->genero = $request->genero;
        $pelicula->director = $request->director;
        $pelicula->fecha_estreno = $request->fecha_estreno;
        $pelicula->save();

        return redirect()->route("listado_peliculas");
        
    }

    public function insertar_pelicula(Request $request)
    {
        // Validar los datos antes de guardar (con mensajes en español)
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'genero' => 'required|string|max:100',
            'director' => 'required|string|max:100',
            'fecha_estreno' => 'required|date',
        ], [
            'titulo.required' => 'Falta título',
            'descripcion.required' => 'Falta descripción',
            'genero.required' => 'Falta género',
            'director.required' => 'Falta director',
            'fecha_estreno.required' => 'Falta fecha',
        ]);

        // Crear y guardar la película
        $pelicula = new Catalogo();
        $pelicula->titulo = $request->titulo;
        $pelicula->descripcion = $request->descripcion;
        $pelicula->genero = $request->genero;
        $pelicula->director = $request->director;
        $pelicula->fecha_estreno = $request->fecha_estreno;
        $pelicula->save();

        return redirect()->route("listado_peliculas")->with('mensaje', 'Película agregada correctamente.');
    }

    public function eliminar_pelicula($id)
    {
        $pelicula = Catalogo::find($id);

        if ($pelicula) {
            $pelicula->delete();
            return redirect()->route('listado_peliculas')->with('mensaje', 'Película eliminada correctamente.');
        }

        return redirect()->route('listado_peliculas')->with('mensaje', 'No se pudo encontrar la película.');
    }

    // Nuevo método para registrar usuario con validación en español
    public function registro(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'usuario' => 'required|string|max:255|unique:users,usuario',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'usuario.required' => 'El usuario es obligatorio.',
            'usuario.unique' => 'El usuario ya está registrado.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
        ]);

        // Crear el usuario
        User::create([
            'name' => $request->name,
            'usuario' => $request->usuario,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Usuario registrado correctamente.');
    }
}
