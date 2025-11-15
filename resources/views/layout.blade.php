<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'CampusBooking Lite')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">CampusBooking Lite</a>
        <div class="d-flex gap-3">
            <a href="{{ route('espacios.index') }}" class="nav-link text-white">Espacios</a>
            <a href="{{ route('reservas.index') }}" class="nav-link text-white">Reservas</a>
        </div>
    </div>
</nav>

<div class="container">
    @yield('contenido')
</div>

</body>
</html>
