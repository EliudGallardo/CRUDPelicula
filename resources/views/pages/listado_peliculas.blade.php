
@extends('plantilla')

@section('contenido')
<div class="container my-5">
    <div class="card" style="background-color: rgba(0, 0, 0, 0.7); border: 2px solid #00f7ff;">
        <div class="card-body content">
            <h2 class="mb-4 text-center" style="color:#f85895; font-family: 'Bangers', cursive;">Listado de Películas</h2>

            

            @if(session('mensaje'))
                <div class="alert alert-success">
                    {{ session('mensaje') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-bordered text-white" style="background-color: transparent;">
                    <thead class="text-center" style="color: #00f7ff;">
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Género</th>
                            <th>Director</th>
                            <th>Fecha de Estreno</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($peliculas as $peli)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td> <!-- Aquí usamos $loop->iteration para numerar consecutivamente -->
                                <td>{{ $peli->titulo }}</td>
                                <td>{{ $peli->descripcion }}</td>
                                <td>{{ $peli->genero }}</td>
                                <td>{{ $peli->director }}</td>
                                <td>{{ $peli->fecha_estreno }}</td>
                                <td>
                                    <a href="{{ route('catalogo.edit', $peli->id) }}" class="btn btn-primary btn-sm">Editar</a>

                                    <form action="{{ route('catalogo.destroy', $peli->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar esta película?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($peliculas->isEmpty())
                    <p class="text-center text-white">No hay películas registradas.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
