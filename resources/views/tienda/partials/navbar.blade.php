<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background:#1f1f1f !important;">
  <div class="container">

    {{-- Brand --}}
    <a class="navbar-brand" href="{{ route('home') }}">
      <h2>Muebles <em>Ligno</em></h2>
    </a>

    {{-- Toggler (móvil) - Bootstrap 4 --}}
    <button class="navbar-toggler" type="button"
            data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    {{-- Links --}}
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}">Inicio</a>
        </li>

        @auth
          {{-- Cliente --}}
          <li class="nav-item">
            <a class="nav-link" href="{{ route('solicitudes.create') }}">Solicitud personalizada</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('solicitudes.index') }}">Mis solicitudes</a>
          </li>

          {{-- Admin --}}
          @can('manage-roles')
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.solicitudes.index') }}">Solicitudes de clientes</a>
            </li>
          @endcan
        @endauth

        {{-- Dropdown "Más" - Bootstrap 4 --}}
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="masDropdown"
             role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Más
          </a>
          <div class="dropdown-menu" aria-labelledby="masDropdown">
            <a class="dropdown-item" href="{{ route('about') }}">Sobre nosotros</a>         
            <a class="dropdown-item" href="{{ route('terms') }}">Términos</a>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact') }}">Contactos</a>
        </li>

        {{-- Bitácoras --}}
        @auth
          @can('view-bitacoras')
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                 aria-haspopup="true" aria-expanded="false">
                Bitácoras
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('bitacoras.mov') }}">Movimientos</a>
                <a class="dropdown-item" href="{{ route('bitacoras.usuario') }}">Usuarios</a>
              </div>
            </li>
          @endcan
        @endauth

        {{-- Mantenimiento roles --}}
        @auth
          @can('manage-roles')
            <li class="nav-item">
              <a class="nav-link" href="{{ route('roles.index') }}">Mantenimiento Roles</a>
            </li>
          @endcan
        @endauth

        {{-- Usuario --}}
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown"
               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ auth()->user()->Usuario }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="{{ route('account.index') }}">Perfil</a>
              <div class="dropdown-divider"></div>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="dropdown-item" type="submit">Cerrar sesión</button>
              </form>
            </div>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
          </li>
        @endauth

      </ul>
    </div>
  </div>
</nav>
