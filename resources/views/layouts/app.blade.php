<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Películas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
        <a class="navbar-brand" id="navbar_brand" href="{{ route('listado_peliculas') }}">
            Lista Películas
        </a>

        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                @if(session('usuario'))
                    <li class="nav-item me-2">
                        <a href="{{ route('inicio') }}" class="btn btn-primary">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item me-2">
                        <a href="{{ route('login') }}" class="btn btn-success">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('registro') }}" class="btn btn-warning">Registrarse</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="container my-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('content')
    </main>

    <!-- GIF decorativo -->
    <img class="gif" src="{{ asset('img/xxx.png') }}" alt="xxx">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
