<?php

namespace App\Http\Controllers;
use App\Models\Catalogo;

use Illuminate\Http\Request;

class CatalogoController extends Controller{
    public function inicio(){
        return view("pages.inicio",["titulo"=>"Inicio"]);
    }
    public function login(){
        return view("pages.login",["titulo"=>"Login"]);
    }
    public function registro(){
        return view("pages.registro",["titulo"=>"Registro"]);
    }
    public function listado_peliculas(){
        $consulta = Catalogo::get();
        /* $consulta = Catalogo::all();
        $consulta = Catalogo::get(); */
        /* $consulta2 = new Catalogo();
        $datos = $consulta2->all(); */
        $peliculas = $consulta;
        return view("pages.listado_peliculas",["titulo"=>"Lista Peliculas","peliculas"=>$peliculas]);
    }
    public function agregar(){
        return view("pages.agregar",["titulo"=>"Agregar"]);
    }
    public function editar(Request $request){
        $consulta = Catalogo::where("id",$request->id)->first();
        return view("pages.editar",["titulo"=>"Editar Pelicula","pelicula"=>$consulta]);
    }
    public function actualizar(Request $request, Catalogo $pelicula){
        $pelicula->titulo = $request->titulo;
        $pelicula->descripcion = $request->descripcion;
        $pelicula->genero = $request->genero;
        $pelicula->director = $request->director;
        $pelicula->fecha_estreno = $request->fecha_estreno;
        $pelicula->save();
        return redirect()->route("listado_peliculas");
    }
    public function insertar_pelicula(Request $request, Catalogo $pelicula){
        $pelicula->titulo = $request->titulo;
        $pelicula->descripcion = $request->descripcion;
        $pelicula->genero = $request->genero;
        $pelicula->director = $request->director;
        $pelicula->fecha_estreno = $request->fecha_estreno;
        $pelicula->save();
        return redirect()->route("listado_peliculas");
    }
    public function eliminar_pelicula($id)
    {
    $pelicula = Catalogo::find($id); // Usamos find() para buscar por el ID

    if ($pelicula) {
        $pelicula->delete(); // Si se encuentra, eliminamos la película
        return redirect()->route('listado_peliculas')->with('mensaje', 'Película eliminada correctamente.');
    }

    return redirect()->route('listado_peliculas')->with('mensaje', 'No se pudo encontrar la película.');
    }
}
