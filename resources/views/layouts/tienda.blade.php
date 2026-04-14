<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Muebles Ligno')</title>

  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">

  <style>
    /* Si tu navbar es fixed-top, sube este valor al alto real del navbar */
    body { padding-top: 70px; } /* ajusta 56/65/70 según tu navbar */
    .navbar { z-index: 3000; }
    .dropdown-menu { z-index: 4000; }
  </style>
</head>

<body>

  {{-- Navbar única para TODA la tienda --}}
  @include('tienda.partials.navbar')

  <main class="pt-4">
    @yield('content')
  </main>

  {{-- JS: una sola vez y en este orden --}}
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <script src="{{ asset('assets/js/owl.js') }}"></script>

</body>
</html>
