@extends('plantilla')

@section('contenido')
@include('components/navbar')
<div class="container mt-5">
    <div class="row mt-5 justify-content-center">
        <form method="post" action="{{ route('actualizar', $pelicula->id) }}" class="col-md-5">
            @csrf
            @method('PUT')
            <div class="card justify-content-center" style="background-color: rgba(255, 255, 255, 0.5);">
                <img class="mx-auto d-block" src="{{ asset('img/xxx.png') }}" height="95" width="125">
                <div class="card-body">
                    <h1 class="fw-bold text-center">Editar</h1>

                    <label class="fw-bold" for="titulo">Titulo</label>
                    <input name="titulo" id="titulo" class="form-control mb-3" type="text" value="{{ $pelicula->titulo }}">

                    <label class="fw-bold" for="descripcion">Descripcion</label>
                    <input name="descripcion" id="descripcion" class="form-control mb-3" type="text" value="{{ $pelicula->descripcion }}">

                    <label class="fw-bold" for="genero">Genero</label>
                    <input name="genero" id="genero" class="form-control mb-3" type="text" value="{{ $pelicula->genero }}">

                    <label class="fw-bold" for="director">Director</label>
                    <input name="director" id="director" class="form-control mb-3" type="text" value="{{ $pelicula->director }}">

                    <label class="fw-bold" for="fecha_estreno">Fecha Estreno</label>
                    <input name="fecha_estreno" id="fecha_estreno" class="form-control mb-3" type="date" value="{{ $pelicula->fecha_estreno }}">

                    <div class="text-center">
                        <button type="submit" class="btn btn-success mb-2">Actualizar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
