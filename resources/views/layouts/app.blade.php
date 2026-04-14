{{-- resources/views/layouts/app.blade.php --}}
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Carga aquí los mismos CSS que usa la página donde se ve como imagen 1 --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-style.css') }}">
</head>
<body>

@include('tienda.partials.navbar') {{-- ESTE es el navbar que se ve como imagen 1 --}}

<main class="container py-4">
    @yield('content')
</main>

{{-- Carga aquí los mismos JS que usa la página donde se ve como imagen 1 --}}
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
