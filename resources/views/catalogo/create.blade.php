@extends('layouts.app')

@section('title', 'Agregar Película')

@section('content')
    <h2 class="mb-4">Agregar nueva película</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/catalogo" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Género</label>
            <input type="text" name="genero" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Director</label>
            <input type="text" name="director" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha de estreno</label>
            <input type="date" name="fecha_estreno" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="/" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
