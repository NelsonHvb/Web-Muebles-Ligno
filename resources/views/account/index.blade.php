@extends('layouts.tienda')

@section('title', 'Mi cuenta')

@section('content')
<div class="container" style="padding-top: 120px; padding-bottom: 60px;">
  <div class="row">
    <div class="col-lg-8 mx-auto">

      {{-- Mensajes --}}
      @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      {{-- PERFIL --}}
      <div class="card mb-4">
        <div class="card-header">
          <h4 class="mb-0">Detalles</h4>
        </div>

        <div class="card-body">
          <p>Usuario: {{ auth()->user()->Usuario }}</p>
          <p>Email: {{ auth()->user()->Email }}</p>
          <p>Teléfono: {{ auth()->user()->TelefonoUsuario ?? '—' }}</p>
          <p>Dirección: {{ auth()->user()->DireccionUsuario ?? '—' }}</p>

          <hr>

          <form method="POST" action="{{ route('account.profile.update') }}">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
              <label for="TelefonoUsuario">Teléfono</label>
              <input
                type="text"
                class="form-control @error('TelefonoUsuario') is-invalid @enderror"
                id="TelefonoUsuario"
                name="TelefonoUsuario"
                value="{{ old('TelefonoUsuario', auth()->user()->TelefonoUsuario) }}"
                placeholder="Ej: 8888-8888"
              >
              @error('TelefonoUsuario') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group mb-3">
              <label for="DireccionUsuario">Dirección</label>
              <input
                type="text"
                class="form-control @error('DireccionUsuario') is-invalid @enderror"
                id="DireccionUsuario"
                name="DireccionUsuario"
                value="{{ old('DireccionUsuario', auth()->user()->DireccionUsuario) }}"
                placeholder="Ej: Carrillos Bajo, Grecia"
              >
              @error('DireccionUsuario') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </form>
        </div>
      </div>

      {{-- SEGURIDAD --}}
      <div class="card mb-4">
        <div class="card-header">
          <h4 class="mb-0">Seguridad</h4>
        </div>

        <div class="card-body">
          <form method="POST" action="{{ route('account.password.update') }}">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
              <label for="current_password">Contraseña actual</label>
              <input type="password" class="form-control" id="current_password" name="current_password" required>
            </div>

            <div class="form-group mb-3">
              <label for="password">Nueva contraseña</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group mb-3">
              <label for="password_confirmation">Confirmar nueva contraseña</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-outline-primary">Cambiar contraseña</button>
          </form>
        </div>
      </div>

      {{-- ZONA DE PELIGRO --}}
      <div class="card border-danger">
        <div class="card-header bg-danger text-white">
          <h4 class="mb-0">Zona de peligro</h4>
        </div>

        <div class="card-body">
          <p class="mb-3">Esto eliminará tu cuenta de forma permanente.</p>

          <form method="POST" action="{{ route('account.destroy') }}"
                onsubmit="return confirm('¿Seguro que deseas eliminar tu usuario? Esta acción no se puede deshacer.');">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Eliminar mi cuenta</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
