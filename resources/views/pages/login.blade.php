@extends('plantilla')

@section('contenido')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="card" style="width: 25rem; background-color: rgba(255, 255, 255, 0.5);">
            <img class="mx-auto d-block" src="{{ asset('img/xxx.png') }}" width="150" height="150">
            <div class="card-body">
                <h1 class="fw-bold text-center">Inicio de Sesión</h1>

                @if(session('error'))
                    <div class="alert alert-danger text-center">{{ session('error') }}</div>
                @endif

                <form action="{{ route('login_usuario') }}" method="POST">
                    @csrf

                    <label class="fw-bold" for="usuario">Usuario</label>
                    <input name="usuario" id="usuario" class="form-control mb-3" type="text" placeholder="Usuario" required>

                    <label class="fw-bold" for="password">Contraseña</label>
                    <input name="password" id="password" class="form-control mb-3" type="password" placeholder="Contraseña" required>

                    <div class="text-center">
                        <button class="btn btn-success mb-2">
                            <i class="fa-solid fa-right-to-bracket"></i> Iniciar
                        </button>
                        <br>
                        <a href="{{ route('registro') }}" class="btn btn-link text-danger">
                            <i class="fa-solid fa-chalkboard-user"></i> Registro
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
