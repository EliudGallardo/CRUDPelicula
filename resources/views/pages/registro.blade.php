@extends('plantilla')

@section('contenido')
<div class="container mt-4">
    <h2 class="text-center text-primary">Formulario de Registro</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('registrar_usuario') }}" method="POST">
        @csrf

        <!-- Campo Nombre -->
        <div class="mb-3">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            @error('name') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>

        <!-- Campo Usuario -->
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario:</label>
            <input type="text" name="usuario" id="usuario" class="form-control" value="{{ old('usuario') }}">
            @error('usuario') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>

        <!-- Campo Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            @error('email') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>

        <!-- Campo Contraseña -->
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password') 
                <div class="text-danger">{{ $message }}</div> 
            @enderror
        </div>

        <!-- Botón de Registro -->
        <button type="submit" class="btn btn-success">Registrar</button>
    </form>
</div>
@endsection
