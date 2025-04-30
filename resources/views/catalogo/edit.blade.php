@extends('layouts.app')

@section('title', 'Editar Película')

@section('content')
    <h2 class="mb-4">Editar Película</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/catalogo/' . $pelicula->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="titulo" value="{{ $pelicula->titulo }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control">{{ $pelicula->descripcion }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Género</label>
            <input type="text" name="genero" value="{{ $pelicula->genero }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Director</label>
            <input type="text" name="director" value="{{ $pelicula->director }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha de estreno</label>
            <input type="date" name="fecha_estreno" value="{{ $pelicula->fecha_estreno }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="/" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
