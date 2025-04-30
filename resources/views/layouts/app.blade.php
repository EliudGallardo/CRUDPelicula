<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Películas')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="fondo-neon">

    <!-- Navbar con clase personalizada -->
    <nav class="navbar navbar-expand-lg navbar-neon">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Catálogo de Películas</a>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

</body>
</html>
