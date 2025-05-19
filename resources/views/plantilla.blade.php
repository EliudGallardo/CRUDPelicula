<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-store" />
    
    <title>{{ $titulo ?? 'Mi App' }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (íconos) -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- Tu CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body class="modo-claro">

    <!-- Navbar principal -->
    @include('components.navbar')

    <!-- Contenido principal con padding para no quedar debajo del navbar fixed-top -->
    <div class="container pt-5 mt-4">
        @yield('contenido')
    </div>

    <!-- Bootstrap JS (para que funcione el offcanvas) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
