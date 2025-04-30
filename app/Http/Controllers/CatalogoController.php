<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;

class CatalogoController extends Controller
{
    public function index(Request $request)
    {
        $query = Pelicula::query();

        // Filtrar por título
        if ($request->filled('titulo')) {
            $query->where('titulo', 'like', '%' . $request->titulo . '%');
        }

        // Filtrar por género
        if ($request->filled('genero')) {
            $query->where('genero', 'like', '%' . $request->genero . '%');
        }

        $peliculas = $query->get();

        return view('catalogo.index', compact('peliculas'));
    }


    public function create()
    {
        return view('catalogo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'genero' => 'required',
            'director' => 'required',
            'fecha_estreno' => 'required|date',
        ]);

        Pelicula::create($request->all());

        return redirect('/')->with('success', 'Película registrada exitosamente.');
    }
    public function edit($id)
    {
        $pelicula = Pelicula::findOrFail($id);
        return view('catalogo.edit', compact('pelicula'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'genero' => 'required',
            'director' => 'required',
            'fecha_estreno' => 'required|date',
        ]);

        $pelicula = Pelicula::findOrFail($id);
        $pelicula->update($request->all());

        return redirect('/')->with('success', 'Película actualizada correctamente.');
    }

    public function destroy($id)
    {
        $pelicula = Pelicula::findOrFail($id);
        $pelicula->delete();

        return redirect('/')->with('success', 'Película eliminada correctamente.');
    }

}
