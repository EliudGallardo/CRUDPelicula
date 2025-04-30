@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <h1 class="mb-4 text-center" style="color: #ff69b4; text-shadow: 0 0 8px #ff69b4;">Catálogo de Películas</h1>

    <form method="GET" action="/" class="row g-3 mb-4">
        <div class="col-md-4">
            <input type="text" name="titulo" class="form-control" placeholder="Buscar por título" value="{{ request('titulo') }}">
        </div>
        <div class="col-md-4">
            <input type="text" name="genero" class="form-control" placeholder="Buscar por género" value="{{ request('genero') }}">
        </div>
        <div class="col-md-2 d-grid">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
        <div class="col-md-2 d-grid">
            <a href="/" class="btn btn-secondary">Limpiar</a>
        </div>
    </form>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="/catalogo/crear" class="btn btn-primary mb-3">Agregar nueva película</a>

    @if($peliculas->count())
        <table class="table table-bordered table-neon">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Género</th>
                    <th>Director</th>
                    <th>Fecha de estreno</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peliculas as $pelicula)
                    <tr>
                        <td>{{ $pelicula->titulo }}</td>
                        <td>{{ $pelicula->descripcion }}</td>
                        <td>{{ $pelicula->genero }}</td>
                        <td>{{ $pelicula->director }}</td>
                        <td>{{ $pelicula->fecha_estreno }}</td>
                        <td>
                            <a href="{{ url('/catalogo/' . $pelicula->id . '/editar') }}" class="btn btn-edit btn-sm">Editar</a>
                            <form action="{{ url('/catalogo/' . $pelicula->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">No se encontraron películas con esos criterios.</div>
    @endif
@endsection
